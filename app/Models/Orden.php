<?php 
namespace App\Models;

use CodeIgniter\Model;

class Orden extends Model{
    protected $table      = 'orders';
    protected $primaryKey = 'OrderID';

    public function __construct() {
        parent::__construct();
    }

    public function insertar($customerID,$employeeID,$shipperID){
        $builder = $this->db->table('orders');
        $data=[
            'CustomerID'=>$customerID,
            'EmployeeID'=>$employeeID,
            'ShipperID'=>$shipperID,
        ];
        $builder->insert($data);
        $OrderID = $this->insertID();

        return $OrderID;
    }
}



