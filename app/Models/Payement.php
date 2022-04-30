<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Payement extends Model
    {
        protected $table ='payement';
        protected $primaryKey='id_payment';
        protected $allowedFields=['id_employee','montant'];

        protected $useTimestamps = true;
        protected $createdField= 'date_retrait';
        protected $updatedField = 'updated_at';
       
        public function historique()
        {
            $reslut= $this->join('employee','employee.employee_id = payement.id_employee ')
                           ->findAll();
            return $reslut;
                        
        }
    }
    