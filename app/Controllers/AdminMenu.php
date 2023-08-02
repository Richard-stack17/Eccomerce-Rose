<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Expedidores;
use App\Models\OrdenDetails;
use App\Models\Categorias;
use App\Models\Empleado;

class AdminMenu extends Controller{
    public function go_producto(){
        $Categoria = new Productos();
        $resultado['categoria']=$Categoria->mostrar_categoria();
        $resultado2['supplier']=$Categoria->mostrar_proveedores();
        $data=[
            'resultado'=>$resultado,
            'resultado2'=>$resultado2
        ];
        return view('productForm',$data);
    }
    // public function go_proveedor(){
    //     return view('supplierForm');
    // }
    public function go_Expedidor(){
        return view('Expedidor');
    }
    public function insertar_proveedor(){
        $empresa=$this->request->getPost('empresa');
        $contacto=$this->request->getPost('contacto');
        $direccion=$this->request->getPost('direccion');
        $ciudad=$this->request->getPost('ciudad');
        $codigoP=$this->request->getPost('codigoP');
        $pais=$this->request->getPost('pais');
        $telefono=$this->request->getPost('telefono');
        $proveedor= new Proveedores();
        $proveedor->insertar($empresa,$contacto,$direccion,$ciudad,$codigoP,$pais,$telefono);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function insertar_producto()
{
    $nombre = $this->request->getPost('nombre');
    $SupplierID = $this->request->getPost('suppliers');
    $CategoryID = $this->request->getPost('categories');
    $Unit = $this->request->getPost('stock');
    $Price = $this->request->getPost('precio');
    $Description = $this->request->getPost('descripcion');
    
    $validationRules = [
        'nombre' => 'required',
        'imagen' => 'uploaded[imagen]|is_image[imagen]'
    ];

    if ($this->validate($validationRules)) {
        $imagen = $this->request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            $nombreArchivo = $imagen->getRandomName();
            $imagen->move('../src/Imagenes/', $nombreArchivo);

            // Aquí puedes realizar la lógica para guardar el nombre del archivo en la base de datos
            // y los demás datos del formulario
            
            $producto = new Productos();
            $producto->insertar_producto($nombre, $SupplierID, $CategoryID, $Unit, $Price, $Description, $nombreArchivo);
        }

        return redirect()->to(base_url('/adminMenu'));
    } else {
        $validationErrors = \Config\Services::validation()->getErrors();
        // Aquí puedes manejar los errores de validación y mostrarlos al usuario
    }
}

// public function mostrarImagen()
// {

//     $imagenesModel = new Productos();
//     $imagen = $imagenesModel->findAll();
//     // Pasa la información de la imagen a la vista
//     return view('mostrar_imagen', ['imagen' => $imagen]);
// }
    public function insertar_expedidor(){
        $nombre=$this->request->getPost('nombre');
        $telefono=$this->request->getPost('telefono');
        $expedidor=new Expedidores();
        $expedidor->insertar($nombre,$telefono);
        return redirect()->to(base_url('/adminMenu'));
    }







    //CODIGO FLORES
    public function producto(){
        return view('Producto');
    }
    // public function go_producto(){
    //     $Categoria = new Productos();
    //     $resultado['categoria']=$Categoria->mostrar_categoria();
    //     $resultado2['supplier']=$Categoria->mostrar_proveedores();
    //     $data=[
    //         'resultado'=>$resultado,
    //         'resultado2'=>$resultado2
    //     ];
    //     return view('productForm',$data);
    // }
    public function mostrar_producto(){
        $mostrarProducto= new Productos();
        $resultado['producto']=$mostrarProducto->select()->join('categories','categories.CategoryID=products.CategoryID')->get();
        $data=[
            'producto'=>$resultado
        ];
        return view('MostrarProducto',$data);
    }
    public function Editar_Producto2(){
        $request = service('request');
        $idProduct= $request->getGet('id');
        $Categoria = new Productos();
        $resultado['categoria']=$Categoria->mostrar_categoria();
        $resultado2['supplier']=$Categoria->mostrar_proveedores();
        $resultado3['producto']=$Categoria->obtener_producto($idProduct);
        $data=[
            'resultado'=>$resultado,
            'resultado2'=>$resultado2,
            'resultado3'=>$resultado3,
        ];
        return view('EditarProducto2',$data);
    }
    public function guardar(){
        $producto= new Productos();
        $id=$this->request->getPost('id');
        $datos_producto['producto']=$producto->where('ProductID',$id)->first();
        $ruta=('../src/Imagenes/'.$datos_producto['producto']['Image']);
        unlink($ruta);
        $validationRules = [
            'nombre' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]'
        ];
        if ($this->validate($validationRules)) {
            $imagen = $this->request->getFile('imagen');}
    
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $nombreArchivo = $imagen->getRandomName();
                $imagen->move('../src/Imagenes/', $nombreArchivo);}
        $datos=[
            'ProductName'=>$this->request->getPost('nombre'),
            'SupplierID'=>$this->request->getPost('suppliers'),
            'CategoryID'=>$this->request->getPost('categories'),
            'Unit'=> $this->request->getPost('stock'),
            'Price'=>$this->request->getPost('precio'),
            'Description'=>$this->request->getPost('descripcion'),
            'Image'=>$nombreArchivo
        ];
        $producto->update($id,$datos);
        return redirect()->to(base_url('/adminMenu'));

    }
    public function mostrar_borrarProducto(){
        $borrarProducto= new Productos();
        $resultado['producto']=$borrarProducto->select()->join('categories','categories.CategoryID=products.CategoryID')->get();
        $data=[
            'producto'=>$resultado
        ];
        return view('BorrarProducto',$data);
    }
    public function EliminarProducto(){
        $borrarProducto= new Productos();
        $request = service('request');
        $idProduct= $request->getGet('id');
        $datos_producto['producto']=$borrarProducto->where('ProductID',$idProduct)->first();
        $ruta=('../src/Imagenes/'.$datos_producto['producto']['Image']);
        unlink($ruta);
        $borrarProducto->where('ProductID',$idProduct)->delete($idProduct);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function go_proveedor(){
        return view('Proveedor');
    }
    public function ProveedorForm(){
        return view('supplierForm');
    }
    public function mostrar_proveedor(){
        $mostrarProveedor= new Proveedores();
        $resultado['proveedor']=$mostrarProveedor->select()->get();
        $data=[
            'proveedor'=>$resultado
        ];
        return view('MostrarProveedor',$data);
    }
    public function guardar_proveedor(){
        $request = service('request');
        $id= $request->getGet('id');
        $Proveedor= new Proveedores();
        $resultado['supplier']=$Proveedor->where('SupplierID ',$id)->first();
        $data=[
            'proveedor'=>$resultado
        ];
        return view('EditarProveedor',$data);    
    }
    public function modificar_proveedor(){
        $nuevoProveedor= new Proveedores();
        $id=$this->request->getPost('id');
        $data=[
            'SupplierName'=>$this->request->getPost('empresa'),
            'ContactName'=>$this->request->getPost('contacto'),
            'Address'=>$this->request->getPost('direccion'),
            'City'=>$this->request->getPost('ciudad'),
            'PostalCode'=>$this->request->getPost('codigoP'),
            'Country'=>$this->request->getPost('pais'),
            'Phone'=>$this->request->getPost('telefono')
        ];
        $nuevoProveedor->where('SupplierID',$id)->update($id,$data);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function mostrar_borrarProveedor(){
        $mostrarProveedor= new Proveedores();
        $resultado['proveedor']=$mostrarProveedor->select()->get();
        $data=[
            'proveedor'=>$resultado
        ];
        return view('BorrarProveedor',$data);
    }
    public function EliminarProveedor(){
        $borrarProveedor= new Proveedores();
        $request = service('request');
        $idProveedor= $request->getGet('id');
        $borrarProveedor->where('SupplierID',$idProveedor)->delete($idProveedor);
        return redirect()->to(base_url('/adminMenu'));
    }
    // 
    
    public function ExpedidorForm(){
        return view('shipperForm');
    }
    public function mostrar_expedidor(){
        $mostrarExpedidor= new Expedidores();
        $resultado['Expedidor']=$mostrarExpedidor->select()->get();
        $data=[
            'Expedidor'=>$resultado
        ];
        return view('MostrarExpedidor',$data);
    }
    public function guardar_expepidor(){
        $request = service('request');
        $id= $request->getGet('id');
        $Expedidor= new Expedidores();
        $resultado['Expedidor']=$Expedidor->where('ShipperID',$id)->first();
        $data=[
            'Expedidor'=>$resultado
        ];
        return view('EditarExpedidor',$data);
    }
    public function modificar_expedidor(){
        $nuevoExpedidor= new Expedidores();
        $id=$this->request->getPost('id');
        $data=[
            'ShipperName'=>$this->request->getPost('nombre'),
            'Phone'=>$this->request->getPost('telefono'),
        ];
        $nuevoExpedidor->where('ShipperID',$id)->update($id,$data);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function mostrar_borrarExpedidor(){
        $mostrarExpedidor= new Expedidores();
        $resultado['expedidor']=$mostrarExpedidor->select()->get();
        $data=[
            'expedidor'=>$resultado
        ];
        return view('BorrarExpedidor',$data);
    }
    public function EliminarExpedidor(){
        $borrarExpedidor= new Expedidores();
        $request = service('request');
        $id= $request->getGet('id');
        $borrarExpedidor->where('ShipperID',$id)->delete($id);
        return redirect()->to(base_url('/adminMenu'));
    }
    // public function insertar_proveedor(){
    //     $empresa=$this->request->getPost('empresa');
    //     $contacto=$this->request->getPost('contacto');
    //     $direccion=$this->request->getPost('direccion');
    //     $ciudad=$this->request->getPost('ciudad');
    //     $codigoP=$this->request->getPost('codigoP');
    //     $pais=$this->request->getPost('pais');
    //     $telefono=$this->request->getPost('telefono');
    //     $proveedor= new Proveedores();
    //     $proveedor->insertar($empresa,$contacto,$direccion,$ciudad,$codigoP,$pais,$telefono);
    //     return redirect()->to(base_url('/adminMenu'));
    // }
//     public function insertar_producto()
// {
//     $nombre = $this->request->getPost('nombre');
//     $SupplierID = $this->request->getPost('suppliers');
//     $CategoryID = $this->request->getPost('categories');
//     $Unit = $this->request->getPost('stock');
//     $Price = $this->request->getPost('precio');
//     $Description = $this->request->getPost('descripcion');
    
//     $validationRules = [
//         'nombre' => 'required',
//         'imagen' => 'uploaded[imagen]|is_image[imagen]'
//     ];

//     if ($this->validate($validationRules)) {
//         $imagen = $this->request->getFile('imagen');

//         if ($imagen->isValid() && !$imagen->hasMoved()) {
//             $nombreArchivo = $imagen->getRandomName();
//             $imagen->move('../src/Imagenes/', $nombreArchivo);

//             // Aquí puedes realizar la lógica para guardar el nombre del archivo en la base de datos
//             // y los demás datos del formulario
            
//             $producto = new Productos();
//             $producto->insertar_producto($nombre, $SupplierID, $CategoryID, $Unit, $Price, $Description, $nombreArchivo);
//         }

//         return redirect()->to(base_url('/adminMenu'));
//     } else {
//         $validationErrors = \Config\Services::validation()->getErrors();
//         // Aquí puedes manejar los errores de validación y mostrarlos al usuario
//     }
// }

// public function mostrarImagen()
// {

//     $imagenesModel = new Productos();
//     $imagen = $imagenesModel->findAll();
//     // Pasa la información de la imagen a la vista
//     return view('mostrar_imagen', ['imagen' => $imagen]);
// }
    // public function insertar_expedidor(){
    //     $nombre=$this->request->getPost('nombre');
    //     $telefono=$this->request->getPost('telefono');
    //     $expedidor=new Expedidores();
    //     $expedidor->insertar($nombre,$telefono);
    //     return redirect()->to(base_url('/adminMenu'));
    // }
        public function go_categorias(){
            return view('Categoria');
}
    public function CategoriaForm(){
        return view('CategoriaForm');

    }
    public function mostrar_categoria(){
        $mostrarCategoria= new Categorias();
        $resultado['categoria']=$mostrarCategoria->select()->get();
        $data=[
            'categoria'=>$resultado
        ];
        return view('MostrarCategoria',$data);
    }
    public function guardar_categoria(){
        $request = service('request');
        $id= $request->getGet('id');
        $Categoria= new Categorias();
        $resultado['categoria']=$Categoria->where('CategoryID',$id)->first();
        $data=[
            'categoria'=>$resultado
        ];
        return view('EditarCategoria',$data);
    }
    public function modificar_categoria(){
        $nuevoCategoria= new Categorias();
        $id=$this->request->getPost('id');
        $data=[
            'CategoryName'=>$this->request->getPost('nombreCat')
        ];
        $nuevoCategoria->where('CategoryID',$id)->update($id,$data);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function mostrar_borrarcategoria(){
        $mostrarCategoria= new Categorias();
        $resultado['categoria']=$mostrarCategoria->select()->get();
        $data=[
            'categoria'=>$resultado
        ];
        return view('BorrarCategoria',$data);
    }
    public function EliminarCategoria(){
        $borrarCategoria= new Categorias();
        $request = service('request');
        $id= $request->getGet('id');
        $borrarCategoria->where('CategoryID',$id)->delete($id);
        return redirect()->to(base_url('/adminMenu'));
    }
    public function ingresardatos(){
        $nombre=$this->request->getPost('nombreCat');
        $categoria=new Categorias();
        $categoria->ingresardatos($nombre);
    return redirect()->to(base_url('/adminMenu'));
    }
    public function go_empleado(){
        return view('Empleado');
}
public function EmpleadoForm(){
    return view('EmpleadoForm');
}
public function mostrar_empleado(){
    $mostrarEmpleado= new Empleado();
    $resultado['empleado']=$mostrarEmpleado->select()->get();
    $data=[
        'empleado'=>$resultado
    ];
    return view('MostrarEmpleado',$data);
}
public function guardar_empleado(){
    $request = service('request');
    $id= $request->getGet('id');
    $empleado= new Empleado();
    $resultado['empleado']=$empleado->where('EmployeeID',$id)->first();
    $data=[
        'empleado'=>$resultado
    ];
    return view('EditarEmpleado',$data);
}
public function modificar_empleado(){
    $nuevoEmpleado= new Empleado();
    $id=$this->request->getPost('id');
    $contra_encriptada=sha1($this->request->getPost('contra'));
    $data=[
        'LastName'=>$this->request->getPost('apellido'),
        'FirstName'=>$this->request->getPost('nombre'),
        'BirthDate'=>$this->request->getPost('cumpleaños'),
        'Notes'=>$this->request->getPost('notas'),
        'DNI'=>$this->request->getPost('dni'),
        'Password'=>$contra_encriptada
    ];
    $nuevoEmpleado->where('EmployeeID',$id)->update($id,$data);
    return redirect()->to(base_url('/adminMenu'));
    
}
public function mostrar_borrarempleado(){
    $mostrarempleado= new Empleado();
    $resultado['empleado']=$mostrarempleado->select()->get();
    $data=[
        'empleado'=>$resultado
    ];
    return view('BorrarEmpleado',$data);
}
public function EliminarEmpleados(){
        $borrarEmpleado= new Empleado();
        $request = service('request');
        $id= $request->getGet('id');
        $borrarEmpleado->where('EmployeeID',$id)->delete($id);
        return redirect()->to(base_url('/adminMenu'));
}
public function insertarempleado(){
    $apellido=$this->request->getPost('apellido');
    $nombre=$this->request->getPost('nombre');
    $cumple=$this->request->getPost('cumpleaños');
    $nota=$this->request->getPost('notas');
    $dni=$this->request->getPost('dni');
    $contra=$this->request->getPost('contra');
    $contra_encriptada=sha1($contra);
    $categoria=new Empleado();
    $categoria->ingresarEmpleado($apellido,$nombre,$cumple,$nota,$dni,$contra_encriptada);
    //contra wa123
return redirect()->to(base_url('/adminMenu'));
}
public function verOrdenes(){
    $Detalle= new OrdenDetails();
    $resultado['consulta']=$Detalle->obtenerConsulta();
    $data=[
        'consulta'=>$resultado
    ];
    return view('VerOrdenes',$data);
}
}