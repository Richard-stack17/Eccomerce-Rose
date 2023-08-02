<?php 
namespace App\Models;

use CodeIgniter\Model;

class Proveedores extends Model{
    protected $table      = 'suppliers';
    protected $primaryKey = 'SupplierID ';
    protected $allowedFields = ['SupplierName','ContactName', 'Address', 'City', 'PostalCode', 'Country', 'Phone'];
    public function insertar($empresa,$contacto,$direccion,$ciudad,$codigoP,$pais,$telefono){
        $builder = $this->db->table('suppliers');
        $data=[
            'SupplierName'=>$empresa,
            'ContactName'=>$contacto,
            'Address'=>$direccion,
            'City'=>$ciudad,
            'PostalCode'=>$codigoP,
            'Country'=>$pais,
            'Phone'=>$telefono
        ];
        $builder->insert($data);
    }
}