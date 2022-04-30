<?php
namespace App\Models;
use CodeIgniter\Model;
class Salaire extends Model
{
    protected $table ='salaire';
    protected $primaryKey='id_salaire';
    protected $allowedFields =['id_employee','salaire','bonus','salaire_du'];
    protected $useTimestamps= true;
    protected $createdField ='created_at';
    protected $updatedField='updated_at';

    public function getSalaire($id)
    {
        $result = $this->join('employee','employee.employee_id = '.$id.'')
                        ->where('id_employee',$id) 
                        ->where('monthname(salaire_du)= monthname(NOW())')
                        ->groupBy('id_employee')
                        ->find();
        return $result;
    }
   
    public function verifier($moth)
    {
        return $this->select('id_salaire,id_employee')
                    ->where('monthname(salaire_du) = monthname("'.$moth.'")')
                    ->findAll();
    }
    public function getdata($start, $length) 
    {
        $result= $this->select('salaire.id_employee as id_employee,salaire.salaire as salaire,salaire.bonus as bonus,monthname(salaire_du) as salaire_du,employee.nom as nom,employee.prenom as prenom,employee.CIN as CIN')
                        ->join('employee','employee.employee_id = salaire.id_employee')
                    //   ->where('monthname(salaire_du) = monthname(NOW())')
                      -> orderBy('id_salaire','desc')
                      ->findAll($start, $length);
        return $result;
    }
    public function getSearch($search,$start, $length)
    {
        $result = $this->select('salaire.id_employee as id_employee,salaire.salaire as salaire,salaire.bonus as bonus,monthname(salaire_du) as salaire_du,employee.nom as nom,employee.prenom as prenom,employee.CIN as CIN')
                        ->join('employee','employee.employee_id = salaire.id_employee')
                        ->like('monthname(salaire_du)',$search.'%')
                        ->orLike('id_employee',$search.'%')
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
    public function getTotalSearch($search=4)
    {
        $result= $this->join('employee','employee.employee_id = salaire.id_employee')
                    ->where('monthname(salaire_du) = monthname(NOW())')
                    ->like('id_employee',$search.'%')
                    ->countAll();
        return $result;
    }

}