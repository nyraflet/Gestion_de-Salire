<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\GestionPersonnel;

class CGestionPersonnel extends BaseController
{
    protected $model;

    function __construct(){
        $this->model= new GestionPersonnel();
    }
    public function index()
    {
        return view('templates/pages/gestionPersonnel');
    }

    public function displayEmployee()
    {
       $result= $this->model->getEmployee();
       echo json_encode($result);
    }
}
