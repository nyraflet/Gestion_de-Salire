<?php
    namespace App\Models;
    use CodeIgniter\Database\ConnectionInterface;
    use CodeIgniter\Model;

    class Service extends Model{
        protected $table = 'service';
        protected $primaryKey = 'id_service';
        protected $allowedFields=['code_service','nom_service','lib_service','salaire_base','endamnite'];
       
        protected $useTimestamps= true;

        protected $createdField = 'e_created_at';
        protected $updatedField = 'e_updated_at';
        #protected $deletedFields = 'e_deleted_at';

        public function showAll($start, $length)
        {
            $result= $this->findAll($start,$length);
                    
            return $result;
        }
        public function getSearch($search,$start,$length)
        {
            $result=$this->like('id_service',$search)
                        -> orLike('code_service',$search)
                        ->findAll($start,$length);
            return $result;
        }
        public function getTotal()
        {
           $result= $this->countAll();
           if(isset($result)){
               return $result;
           }
           return 0;
        }
        public function getTotalSearch($search )
        {
            $result= $this->like('id_service',$search)
                          ->orLike('code_service',$search)
                          ->countAll();
            return $result;
        }

        public function setSalaire()
        {
            $result = $this->join('gestionPersonnel','service.id_service = gestionPersonnel.id_service')
                            ->join('employee','employee.employee_id = gestionPersonnel.id_employee')
                            ->groupBy('gestionPersonnel.id_employee')
                            ->findAll();
            return $result;
        }
    }
    
?>
