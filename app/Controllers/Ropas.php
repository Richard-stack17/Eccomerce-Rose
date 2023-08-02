<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Categorias;

class Ropas extends Controller{
    public function polos(){
        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        $Categoria = new Categorias();
        $resultado['categoria']=$Categoria->obtener_categoria();
        $id=1;
        $data=[
        'resultado'=>$resultado,
        'imagen' => $imagen,
        'id'=> $id
        ];
        return view('polos',$data);
    }
    public function vestidos(){
        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        return view('vestidos',['imagen' => $imagen]);
    }
    public function jeans(){
        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        return view('jeans',['imagen' => $imagen]);
    }
    public function casacas(){
        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        return view('casacas',['imagen' => $imagen]);
    }
    public function chalecos(){
        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        return view('chalecos',['imagen' => $imagen]);
    }
    public function ordenar()
{
    $Products = new Productos();
    $Proveedores = new Proveedores();


    
    $order = $this->request->getPost('order');

    if ($order == 'asc') {
        $Products->orderBy('Price', 'asc');
    } elseif ($order == 'desc') {
        $Products->orderBy('Price', 'desc');
    } elseif ($order == 'alpha') {
        $Products->orderBy('ProductName', 'asc');
    } elseif ($order == 'brand') {
                // Realizar el join entre las tablas de productos y proveedores
            $Products->join('Suppliers', 'Suppliers.SupplierID = Products.SupplierID');
            // Utilizar distinct() para obtener resultados únicos
            $Products->distinct();
            // Ordenar los productos por la marca (proveedor) de forma ascendente
            $Products->orderBy('Suppliers.SupplierName', 'asc');


    }

    $productos = $Products->findAll();

    $Categoria = new Categorias();
    $resultado['categoria']=$Categoria->obtener_categoria();
    $request = service('request');
    $id= $request->getGet('ropaId');
    $data=[
        'resultado'=>$resultado,
        'imagen' => $productos,
        'id'=>$id
        ];
    // Cargar la vista y pasar los productos ordenados como datos
    return view('polos', $data);
}
    public function redireccionar() {


        $imagenesModel = new Productos();
        $imagen = $imagenesModel->findAll();
        $Categoria = new Categorias();
        $resultado['categoria']=$Categoria->obtener_categoria();
        $request = service('request');
        $id= $request->getGet('ropaId');
        $data=[
        'resultado'=>$resultado,
        'imagen' => $imagen,
        'id'=> $id
        ];
        return view('polos',$data);
    }
}