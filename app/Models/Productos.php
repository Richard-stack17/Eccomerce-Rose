<?php 
namespace App\Models;

use CodeIgniter\Model;

class Productos extends Model{
    protected $table      = 'products';
    protected $primaryKey = 'ProductID';
    protected $allowedFields = ['ProductName','SupplierID', 'CategoryID', 'Unit', 'Price', 'Description', 'Image'];
    public function mostrar_categoria(){
        $categoria= $this->db->table('categories');
        $categoria->select('CategoryID,CategoryName');
        $query=$categoria->get();
        return $query;
    }
    public function mostrar_proveedores(){
        $categoria= $this->db->table('suppliers');
        $categoria->select('SupplierID,SupplierName');
        $query=$categoria->get();
        return $query;
    }
    public function mostrar_enviadores(){
        $categoria= $this->db->table('shippers');
        $categoria->select('ShipperID,ShipperName');
        $query=$categoria->get();
        return $query;
    }
    public function mostrar_empleados(){
        $categoria= $this->db->table('employees');
        $categoria->select('EmployeeID,LastName');
        $query=$categoria->get();
        return $query;
    }
    public function insertar_producto($nombre,$SupplierID,$CategoryID,$Unit,$Price,$Description,$nombreArchivo){
        $builder = $this->db->table('products');
        $data=[
            'ProductName'=>$nombre,
            'SupplierID'=>$SupplierID,
            'CategoryID'=>$CategoryID,
            'Unit'=>$Unit,
            'Price'=>$Price,
            'Description'=>$Description,
            'Image'=>$nombreArchivo
        ];
        $builder->insert($data);
    }
    public function obtenerCategoriaPorCondicion()
{
    $builder = $this->db->table('products');
    $builder->select('ProductID');
    // Agrega aquí la condición para buscar la categoría según tus necesidades
    // Por ejemplo:
    $builder->where('condicion', 'valor');

    $query = $builder->get();

    if ($query->getNumRows() > 0) {
        $resultados = $query->getResultArray();
        return $resultados;
    } else {
        return [];
    }
}
public function obtener_producto($id){
    $producto= $this->db->table('products');
    $producto->select('*')->where('ProductID',$id);
    $query=$producto->get();
    return $query;
}
}