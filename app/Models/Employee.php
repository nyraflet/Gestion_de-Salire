<?php
    namespace App\Models;
   // use CodeIgniter\Database\ConnectionInterface;
    use CodeIgniter\Model;

    class Employee extends Model{
        protected $table = 'employee';
        protected $primaryKey = 'employee_id';
        protected $allowedFields=['nom','prenom','sexe','CIN','contacte','adresse','password'];
       
        protected $useTimestamps= true;

        protected $createdField = 'e_created_at';
        protected $updatedField = 'e_updated_at';

        public function rulesValidator($methode = null)
        {
            $rulesvalidation=[
                'nom' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'votre {field} ne doit etre vide '
                        ]
                    ],
                'prenom'=>[
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} ne peut pas etre vide'
                    ]
                    ],
                'sexe'=>[
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} est vide'
                    ]
                ],
                'CIN'=>[
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Votre CIN est obligatoire !'
                    ]
                ],
                'contacte' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} ne peut pas etre vide '
                    ]
                ],
            'adresse'=>[
                'rules' => 'required',
                    'errors' => [
                        'required' => '{field} ne peut pas etre vide '
                    ]
                ]

            ];
           return $rulesvalidation;
        }
        public function getdata($start, $length) 
        {
            $result= $this->orderBy('employee_id','desc')
                ->findAll($start,$length);
            return $result;
        }
        public function getSearch($search,$start, $length)
        {
            $result= $this->like('employee_id',$search)
                          ->orLike('nom',$search)
                          ->orLike('prenom',$search)
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
            $result= $this->like('employee_id',$search)
                          ->orLike('nom',$search)
                          ->orLike('prenom',$search)
                          ->countAll();
            return $result;
        }
        public function auth($username,$password)
        {
           return $this->where(['nom'=>$username,'password'=>$password])->find();
        }
    }
    
?>