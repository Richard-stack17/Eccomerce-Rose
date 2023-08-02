<?php 

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model {
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    protected $allowedFields = ['CustomerName', 'Last_Name', 'Address', 'City', 'DNI', 'Country', 'Phone', 'email'];
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertar($nombre, $apellido, $direccion, $ciudad, $DNI, $pais, $telefono, $email)
    {
        $data = [
            'CustomerName' => $nombre,
            'Last_Name' => $apellido,
            'Address' => $direccion,
            'City' => $ciudad,
            'DNI' => $DNI,
            'Country' => $pais,
            'Phone' => $telefono,
            'email' => $email
        ];

        $this->insert($data);

        // Obtén el CustomerID del registro insertado
        $customerID = $this->insertID();

        return $customerID;
    }
}
