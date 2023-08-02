<?php 
namespace App\Models;

use CodeIgniter\Model;

class Empleado extends Model{
    protected $table      = 'employees';
    protected $primaryKey = 'EmployeeID';
    protected $allowedFields = ['LastName','FirstName','BirthDate','Notes','DNI','Password'];

    public function __construct() {
        parent::__construct();
    }
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    public function ingresarEmpleado($apellido,$nombre,$fecha,$nota,$dni,$contra){
        $builder = $this->db->table('employees');
        $data=[
            'LastName'=>$apellido,
            'FirstName'=>$nombre,
            'BirthDate'=>$fecha,
            'Notes'=>$nota,
            'DNI'=>$dni,
            'Password'=>$contra
        ];
        $builder->insert($data);
        $EmployeeID = $this->insertID();

        return $EmployeeID;
    }
}