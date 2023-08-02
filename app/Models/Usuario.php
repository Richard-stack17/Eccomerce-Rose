<?php 
namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{
    protected $table      = 'employees';
    protected $db;
    public function __construct(){
    $this->db = \Config\Database::connect();
    }
    public function ObtenerUsuario($data){
        $Usuario = $this->db->table('employees');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    }
}