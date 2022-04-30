<?php
namespace App\Controllers\Admin; 
use App\Controllers\BaseController;
use App\Models\Service;
    
    class CService extends BaseController
    
    {
        protected $model;

        public function __construct()
        {
            $this->model= new Service();
        }
        
        public function index()
        {
            return view('templates/pages/service');
        }
        public function create()
        {
            $data=[
                'code_service'=>$this->request->getVar('code_service'),
                'nom_service'=>$this->request->getVar('nom_service'),
                'lib_service'=>$this->request->getVar('lib_service'),
                'salaire_base'=>$this->request->getVar('salaire_base'),
                'endamnite'=>$this->request->getVar('endamnite'),
            ];
            if($this->model->save($data)){
                echo json_encode(['satatus',true]);
            }else{
                json_encode(['status',false]);
            }
        }
        //edit data

    public function edit($id)
	{
		$data= $this->model->find($id);
		echo json_encode($data);
		if($this->request->getMethod()=='post'){
			$this->_validate('save');
			$data= [
				'id_service'=>$id,
				'code_service'=>$this->request->getVar('code_service'),
				'nom_service'=>$this->request->getVar('nom_service'),
				'nom_service'=>$this->request->getVar('nom_service'),
				'salaire_base'=>$this->request->getVar('salaire_base'),
				'endamnite'=>$this->request->getVar('endamnite'),				
			];
			if($this->model->save($data)){
				echo json_encode(['status'=>true]);
			}else{
				echo json_encode(['status'=>false]);
			}
		}
	}
        public function listService()
        {
            $draw= $_REQUEST['draw'];
            $start =$_REQUEST['start'];
            $length = $_REQUEST['length'];
            $search = $_REQUEST['search']['value'];

            $total = $this->model->getTotal();
            $output = [
                'lenght'=>$length,
                'draw'=>$draw,
                'recordsTotal'=>$start,
                'recordsFiltered'=>$total
            ];

            if($search !==""){
                $list= $this->model->getSearch($search,$start,$length);			
            }else{
                $list= $this->model->showAll($start,$length);			
            }

            if($search !==""){
                $total_find= $this->model->getTotalSearch($search);
                $output=[
                    "recordsTotal"=>$total_find,
                    "recordsFiltered"=>$total_find
                ];
            }

            $data=[];
            $no = $start +1;
            foreach($list as $temp){
                $action='
                <div style="display:flex;justify-content:space-between">
                    <a href="javascript:void(0)" class="nav-icon fa fa-edit" onclick="editData('.$temp['id_service'].')">edit</a>
                    <a href="javascript:void(0)" class="nav-icon fa fa-trash" onclick="deleteData('.$temp['id_service'].')">delete</a>
                </div>                    
                ';
                $row=[];
                $row[]= $no;
                $row[]=$temp['code_service'];
                $row[]=$temp['nom_service'];
                $row[]=$temp['lib_service'];
                $row[]=$temp['salaire_base'];
                $row[]= $temp['endamnite'];
                $row[]=$action;
                $data[]= $row;
                $no ++;
            }

            $output['data']=$data;
            echo json_encode($output);
        }
        public function test()
        {
           $list= $this->model->showAll();
           echo json_encode($list);
        }
    }
?>