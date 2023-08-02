<?php 
namespace App\Models;

use CodeIgniter\Model;

class Categorias extends Model{
    protected $table      = 'categories';
    protected $primaryKey = 'CategoryID';
    protected $allowedFields = ['CategoryName'];
    public function ingresardatos($nombreCategoria){
        $builder = $this->db->table('categories');
        $data=[
            'CategoryName'=>$nombreCategoria
        ];
        $builder->insert($data);
    }
    public function obtener_categoria(){
        $categoria= $this->db->table('categories');
        $categoria->select('CategoryID,CategoryName');
        $query=$categoria->get();
        return $query;
    }
}