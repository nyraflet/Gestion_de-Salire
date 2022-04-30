<?php 
namespace App\Controllers\Admin; 
use App\Controllers\BaseController;
use App\Models\Employee;
    
    class Login extends BaseController{
    protected $model;
    public function __construct()
	{
		$this->model = new Employee();

	}
    public function index()
    {
        $result = $this->model->auth('MARTIN','445');
        echo json_encode($result);
        //return view('templates/pages/login');
    }
        
    }
