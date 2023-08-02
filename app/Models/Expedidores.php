<?php 
namespace App\Models;

use CodeIgniter\Model;

class Expedidores extends Model{
    protected $table      = 'shippers';
    protected $primaryKey = 'ShipperID ';
    protected $allowedFields = ['ShipperName','Phone'];

    public function __construct() {
        parent::__construct();
    }

    public function insertar($nombre,$telefono){
        $builder = $this->db->table('shippers');
        $data=[
            'ShipperName'=>$nombre,
            'Phone'=>$telefono
        ];
        $builder->insert($data);

        $ShipperID = $this->insertID();

        return $ShipperID;
    }
}

