<?php 
namespace App\Controllers\Admin;
use  App\Controllers\BaseController;
use App\Models\Salaire;
use App\Models\Service;
use App\Models\GestionPersonnel;

class CSalaire extends BaseController
{
    protected $model;
    protected $modelS;
    protected $modelGp;
    protected $idSalaire=[];
    protected $idEmployee=[];
    protected $today;
    //constructeur
    function __construct() {
        $this->model = new Salaire();
        $this->modelS= new Service();
        $this->modelGP= new GestionPersonnel();
    }
    //function pour afficher le salaire de personnel
    public function index()
    {
        return view('templates/pages/salaire');
    }
    //function pour inserer et calculer automatique les alaires des Employees(insertion )
    public function generer()
    { 
        $datadate=[
            $this->today = $this->request->getVar('salaire_du'),
        ];
        echo $this->today;
        $result1 = $this->model->verifier($this->today);
        foreach($result1 as $res){
            $this->idSalaire[]=$res['id_salaire'];
            $this->idEmployee[]= $res['id_employee'];
            
        }
       
        $valeurs= $this->modelS->setSalaire();
        
        if($this->idEmployee !=null){  
           // echo json_encode($this->idEmployee);      
            foreach($valeurs as $val){
                //$data= $this->model->findAll($this->idSalaire);
                
                $data=[
                    'id_salaire'=>$this->idSalaire,
                    'id_employee'=>$val['id_employee'],
                    'salaire'=>$val['salaire_base']+$val['endamnite'],
                    'bonus'=>0.0,
                    'salaire_du'=>$this->today,
                ];
                if($this->model->save($data)){
                    echo json_encode(['status'=>true]);
                }else{
                    echo json_encode(['status'=>false]);
                }
            }
        }else{
        //echo json_encode($valeurs);
            foreach($valeurs as $val){
                $data=[
                    'id_employee'=>$val['id_employee'],
                    'salaire'=>$val['salaire_base']+$val['endamnite'],
                    'bonus'=>100,
                    'salaire_du'=>$this->today,
                ];
                 $this->model->save($data);
            }           
    
        }
       
    }

    public function list()
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
			$list= $this->model->getData($start,$length);			
		}

		if($search !==""){
			$total_find= $this->model->getTotalSearch($search);
			$output=[
				"recordsTotal"=>$total_find,
				"recordsFiltered"=>$total_find
			];
		}

        $data=[];
        foreach($list as $temp ){           
            $row=[];
            $row[]=$temp['id_employee'];
            $row[]=$temp['nom'];
            $row[]=$temp['prenom'];
            $row[]=$temp['CIN'];
            $row[]=$temp['salaire'];
            $row[]=$temp['bonus'];
            $row[]=$temp['salaire_du'];

            $data[]= $row;
        }

        $output['data']=$data;
        echo json_encode($output);
    }

    //fonction teste
    public function teste()
    {
         $result = $this->model->getTotalSearch();
         echo json_encode($result);
    }
}