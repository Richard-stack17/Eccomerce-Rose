<?php 
namespace App\Models;

use CodeIgniter\Model;

class OrdenDetails extends Model{
    protected $table      = 'orderdetails';
    protected $primaryKey = 'OrderDetailID';
    public function obtenerConsulta(){
        $db= \Config\Database::connect();
        $builder = $db->table('orderdetails');
        $builder->select('orderdetails.OrderDetailID,customers.CustomerName,employees.LastName,shippers.ShipperName,products.ProductName,categories.CategoryName,orderdetails.Quantity, orderdetails.TotalCost');
        $builder->join('orders','orderdetails.OrderID=orders.OrderID')->join('customers','orders.CustomerID=customers.CustomerID')->join('employees','orders.EmployeeID=employees.EmployeeID')->join('shippers','orders.ShipperID=shippers.ShipperID')->join('products','orderdetails.ProductID=products.ProductID')->join('categories','products.CategoryID=categories.CategoryID');
        $builder->orderBy('CustomerName','ASC');
        $query=$builder->get();
        return $query;
    }
}