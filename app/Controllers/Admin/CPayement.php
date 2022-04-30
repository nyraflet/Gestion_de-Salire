<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Payement;
use App\Models\Salaire;
use App\Models\Employee;

class CPayement extends BaseController
{
    protected $model;
    protected $Msalaire;
    protected $Memployee;

    protected $idSalaire;
    protected $idEmployee;
    protected $nom;
    protected $contact;
    protected $cin;

    protected $reste;
    protected $retirer;
    protected $moisEncours;
    protected $salaire_du;

	public function __construct()
	{
		$this->model = new Payement();
        $this->Msalaire= new Salaire();

	}
    public function index()
    {
        $data=[
			'lP'=> $this->model->historique(),
		];
       return view('templates/pages/historique',$data);
    }

    public function rettrait($id)
    {
       $result = $this->Msalaire->getSalaire($id);       
       foreach($result as $rs){
            $this->idSalaire= $rs['id_salaire'];
            $this->reste = $rs['salaire'];
            $this->idEmployee=$rs['id_employee'];
            $this->salaire_du=$rs['salaire_du'];
            $this->nom=$rs['nom'];
            $this->cin=$rs['CIN'];
            $this->contact=$rs['contacte'];
        }

        $data=[
            'id'=>$this->idEmployee,
            'nom'=>$this->nom,
            'cin'=>$this->cin,
            'contact'=>$this->contact,
            'salaire'=>$this->reste,
            'val'=>json_encode($result),

        ];
        echo $this->reste." ".$this->idEmployee."  ".$this->idSalaire;
        if($this->request->getMethod()=='post'){  
            $data=[
                $this->retirer=$this->request->getVar('montant'),
            ];                   
            echo "montant=".$this->retirer." ";
            if($this->reste > 0 && $this->reste >= $this->retirer) {
                $this->reste =$this->reste - $this->retirer;
                $data0=[
                    'id_salaire'=>$this->idSalaire,
                    'salaire'=>$this->reste,
                ];
                if($this->Msalaire->save($data0)){
                    echo json_encode(['status'=>true]);                  
                }else{
                    echo json_encode(['status'=>false]);
                }
                $data1=[
                    'id_employee'=>$id,
                    'montant'=>$this->retirer,
                ];
                if($this->model->save($data1)){
                    echo json_encode(['status'=>true]);                  
                }else{
                    echo json_encode(['status'=>false]);
                }
            }else{
                echo json_encode(['status'=>false]);
            }
            
          }
          
        return view('templates/pages/payement',$data);
    }

//    public function rettrait(){

//    }
}