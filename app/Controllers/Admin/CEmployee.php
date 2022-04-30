<?php

namespace App\Controllers\Admin;
//importion of base controller
use App\Controllers\BaseController;
use App\Models\Employee;

class CEmployee extends BaseController
{
	protected $model;

	public function __construct()
	{
		$this->model = new Employee();
	}
	public function index()
	{		
		return view('templates/pages/employee');
	}
	public function listes()
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

		$data =[];
		$no = $start +1;
		foreach($list as $temp){
			$action='
				<div class="w3-dropdown-hover w3-right" style="">
				<button class="w3-button w3-amber">Action</button>
					<div class="w3-dropdown-content w3-bar-block w3-border" style="right:0;margin-right:30px; width:30px">
						<a href="javascript:void(0)" class="w3-bar-item w3-button w3-orange nav-icon fa fa-edit" onclick="editData('.$temp['employee_id'].')"> edit</a>
						<a href="javascript:void(0)" class="w3-bar-item w3-button w3-red nav-icon fa fa-trash" onclick="deleteData('.$temp['employee_id'].')">delete</a>
						<a href="/payement/rettrait/'.$temp['employee_id'].'" class="w3-bar-item w3-button nav-icon fa fa-usd">Payement</a>
					</div>
				</div>
				
			';
			$row=[];
			$row[]=$no;
			$row[]=$temp['nom'];
			$row[]=$temp['prenom'];
			$row[]=$temp['sexe'];
			$row[]=$temp['CIN'];
			$row[]=$temp['contacte'];
			$row[]=$temp['adresse'];
			$row[]=$action;
			$data[]= $row;
			$no ++;
		}

		$output['data'] =$data;
		echo json_encode($output);
		exit();
	}

	public function create()
	{
		$this->_validate('save');
		$data= [
			'nom'=>$this->request->getVar('nom'),
			'prenom'=>$this->request->getVar('prenom'),
			'sexe'=>$this->request->getVar('sexe'),
			'CIN'=>$this->request->getVar('CIN'),
			'contacte'=>$this->request->getVar('contacte'),
			'adresse'=>$this->request->getVar('adresse'),
			'password'=>$this->request->getVar('password'),
		];
		if($this->model->save($data)){
			echo json_encode(['status'=>true]);
		}else{
			echo json_encode(['status'=>false]);
		}
	}

	public function edit($id)
	{
		$data= $this->model->find($id);
		echo json_encode($data);
		if($this->request->getMethod()=='post'){
			$this->_validate('save');
			$data= [
				'employee_id'=>$id,
				'nom'=>$this->request->getVar('nom'),
				'prenom'=>$this->request->getVar('prenom'),
				'sexe'=>$this->request->getVar('sexe'),
				'CIN'=>$this->request->getVar('CIN'),
				'contacte'=>$this->request->getVar('contacte'),
				'adresse'=>$this->request->getVar('adresse'),
				'password'=>$this->request->getVar('password'),
			];
			if($this->model->save($data)){
				echo json_encode(['status'=>true]);
			}else{
				echo json_encode(['status'=>false]);
			}
		}
	}
	public function delete($id)
	{
		$data= $this->model->find($id);
		if($this->model->delete($id)){
			echo json_encode(['status'=>true]);
		}else{
			echo json_encode(['status'=>false]);
		}
	}
	public function _validate($method)
	{
		if(!$this->validate($this->model->rulesValidator($method))){
			$validation = \Config\Services::validation();
			$data=[];
			$data['inputerror']=[];
			$data['error_string']=[];
			$data['status']=TRUE;

			if($validation->hasError('nom')){
				$data['inputerror'][]='nom';
				$data['error_string'][]=$validation->getError('nom');
				$data['status']=FALSE;
			}

			if($validation->hasError('prenom')){
				$data['inputerror'][]='prenom';
				$data['error_string'][]=$validation->getError('prenom');
				$data['status']=FALSE;
			}

			if($validation->hasError('sexe')){
				$data['inputerror'][]='sexe';
				$data['error_string'][]=$validation->getError('sexe');
				$data['status']=FALSE;
			}

			if($validation->hasError('cin')){
				$data['inputerror'][]='cin';
				$data['error_string'][]=$validation->getError('cin');
				$data['status']=FALSE;
			}
			if($validation->hasError('contacte')){
				$data['inputerror'][]='contacte';
				$data['error_string'][]=$validation->getError('contacte');
				$data['status']=FALSE;
			}

			if($validation->hasError('adresse')){
				$data['inputerror'][]='adresse';
				$data['error_string'][]=$validation->getError('adresse');
				$data['status']=FALSE;
			}
			if($data['status']===FALSE){
				echo json_encode($data);
				exit();
			}
		}
	}
}
