<?php 
namespace App\Models;

use CodeIgniter\Model;

class OrdenDetail extends Model{
    protected $table      = 'orderdetails';
    public function insertar($orderID,$productID,$total,$cantidad){
        $builder = $this->db->table('orderdetails');
        $data=[
            'OrderID'=>$orderID,
            'ProductID'=>$productID,
            'TotalCost'=>$total,
            'Quantity'=>$cantidad
        ];
        $builder->insert($data);
    }
}