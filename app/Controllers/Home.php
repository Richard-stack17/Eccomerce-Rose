<?php

namespace App\Controllers;
use App\Models\Usuario;
use App\Models\Productos;
use App\Models\Customer;
use App\Models\Orden;
use App\Models\OrdenDetail;
use App\Models\Expedidores;
use App\Models\Empleado;
use App\Models\Categorias;

class Home extends BaseController
{
    public function index()
    {
        return view('index.php');
    }

    public function login(){
        $usuario=$this->request->getPost('DNI');
        $password=$this->request->getPost('Password');
        $contra_encriptada=sha1($password);
        $Usuario= new Usuario();
        $datosUsuario=$Usuario->ObtenerUsuario(['Dni'=>$usuario]);


        
        if(count($datosUsuario)>0 and $contra_encriptada==$datosUsuario[0]['Password'] and $datosUsuario){
            return redirect()->to(base_url('/adminMenu'));
        }
        else {
            return view('loginError');
        }
        
        
    }
    public function go_login(){
        return view('login');
    }
    public function go_ropas(){
        return view('ropas');
    }
    public function go_adminMenu(){
        return view('adminMenu');
    }
    public function capturarIDImagen()
{
    $Products = new Productos();
    $request = service('request');
    $idProduct= $request->getGet('id');
    $Product= $Products->find($idProduct);
    $Categoria = new Categorias();
    $resultado['categoria']=$Categoria->obtener_categoria();

    $categorias = $Categoria->findAll();

    // Find the category name associated with the product
    $categoryName = '';
    foreach ($categorias as $categoria) {
        if ($categoria['CategoryID'] === $Product['CategoryID']) {
            $categoryName = $categoria['CategoryName'];
            break;
        }
    }


    $data=[
        'Product' => $Product,
        'idProduct'=>$idProduct,
        'resultado'=>$resultado,
        'categoryName' => $categoryName
    ];
    return view('clotheOnly',$data);
    }
    public function enviar_compra()
{
    $producto= new Productos();
    $request = service('request');
    $idProducto= $request->getGet('id');
    $Producto=$producto->find($idProducto);
    $cantidad=$this->request->getPost('cantidad');
    $data=[
        'product'=>$Producto,
        'idProducto'=>$idProducto,
        'cantidad'=>$cantidad
    ];
    return view('compra',$data);
    }

    public function carrito(){
        $producto= new Productos();
        $request = service('request');
        $idProducto= $request->getGet('id');
        $cantidad= $request->getGet('cantidad');
        $Producto=$producto->find($idProducto);
        $data=[
            'product'=>$Producto,
            'idProducto'=>$idProducto,
            'cantidad'=>$cantidad
        ];
        return view('compra2',$data);
    }
    public function insertar_cliente()
{
    $nombre = $this->request->getPost('nombres');
    $apellido = $this->request->getPost('apellidos');
    $direccion = $this->request->getPost('direccion');
    $ciudad = $this->request->getPost('ciudad');
    $DNI = $this->request->getPost('DNI');
    $pais = $this->request->getPost('pais');
    $telefono = $this->request->getPost('telefono');
    $email = $this->request->getPost('email');

    $customerModel = new Customer();
    $customer = $customerModel->insertar($nombre, $apellido, $direccion, $ciudad, $DNI, $pais, $telefono, $email);
    $customerID = $customer;

    $producto = new Productos();
    $request = service('request');
    $idProducto = $request->getGet('id');
    $cantidad = $request->getGet('cantidad');
    $Producto = $producto->find($idProducto);

    $resultado3['employee'] = $producto->mostrar_empleados();
    $resultado4['shipper'] = $producto->mostrar_enviadores();

    $data = [
        'product' => $Producto,
        'idProducto' => $idProducto,
        'cantidad' => $cantidad,
        'customerId' => $customerID,
        'resultado3' => $resultado3,
        'resultado4' => $resultado4
    ];

    return view('compra3', $data);
}


public function generar_orden()
{
    $producto = new Productos();
    $request = service('request');
    $idProducto = $request->getGet('id');
    $cantidad = $request->getGet('cantidad');
    $employeeID = $this->request->getPost('empleado');
    $shipperID = $this->request->getPost('enviador');
    $customerID = $request->getGet('customerId');

    $customerModel = new Customer();
    $customer = $customerModel->find($customerID);
    $producto = $producto->find($idProducto);

    $orden = new Orden();
    $ordenId = $orden->insertar($customerID, $employeeID, $shipperID);


    $data = [
        'product' => $producto,
        'idProducto' => $idProducto,
        'cantidad' => $cantidad,
        'customer' => $customer,
        'customerId' => $customerID,
        'ordenId' => $ordenId
    ];

    return view('compra4', $data);
}
public function generar_ordenDetail()
    {

            $answer = $this->request->getPost('answer');
            
            if ($answer == '1') {
                $request = service('request');
                $customerID = $request->getGet('customerId');
                $idProducto = $request->getGet('id');
                $orderId= $request->getGet('orderId');
                $cantidad = $request->getGet('cantidad');

                $customerModel = new Customer();
                $productoModel = new Productos();
                $orderModel= new Orden();
                $shipperModel = new Expedidores();
                $employeeModel = new Empleado();  //tengo que poner el modelo
                $ordenDetailModel = new OrdenDetail();
                

                $customer= $customerModel->find($customerID);
                $producto=$productoModel->find($idProducto);
                $orden = $orderModel->find($orderId);

                $shipper= $shipperModel->find($orden['ShipperID']);
                $employee = $employeeModel->find($orden['EmployeeID']);


                $totalCost= $producto['Price']*$cantidad;

                $ordenDetailModel->insertar($orderId,$idProducto,$totalCost,$cantidad);

                $data = [
                    'product' => $producto,
                    'idProducto' => $idProducto,
                    'cantidad' => $cantidad,
                    'customer' => $customer,
                    'totalCost' =>$totalCost,
                    'orden'=>$orden,
                    'shipper'=>$shipper,
                    'employee'=>$employee
                                    
                ];


                return view('boleta',$data);
            } else {
                return view('index');
            }
}
}
