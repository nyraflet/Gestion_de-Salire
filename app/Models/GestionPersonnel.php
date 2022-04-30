<?php
namespace App\Models;
use CodeIgniter\Model;
    class GestionPersonnel extends Model
    {
        protected $table ="gestionPersonnel";
        protected $primaryKey="id_GS";
        protected $allowedFields=['id_employee','id_service','debut_service','fin_service'];
        
        public function getEmployee()
        {
           $result = $this->findAll();
           return $result;
        }
    }
?>