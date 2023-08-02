<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::go_login');
// $routes->get('/ropas', 'Home::go_ropas');
$routes->post('/enviar', 'Home::login');
$routes->get('/adminMenu', 'Home::go_adminMenu');
// $routes->get('/go_producto', 'AdminMenu::go_producto');
//producto
$routes->get('/go_producto', 'AdminMenu::producto');
$routes->get('/registrar', 'AdminMenu::go_producto');
$routes->get('/mostrar', 'AdminMenu::mostrar_producto');
$routes->get('/editar', 'AdminMenu::Editar_Producto2');
$routes->post('/guardar_producto', 'AdminMenu::guardar');
$routes->get('/borrar', 'AdminMenu::mostrar_borrarProducto');
$routes->get('/borrar_producto', 'AdminMenu::EliminarProducto');


//proveedor
$routes->get('/proveedor', 'AdminMenu::go_proveedor');
$routes->get('/registrar_proveedor', 'AdminMenu::ProveedorForm');
$routes->get('/mostrar_proveedor', 'AdminMenu::mostrar_proveedor');
$routes->get('/editar_proveedor', 'AdminMenu::guardar_proveedor');
$routes->post('/guardar_proveedor', 'AdminMenu::modificar_proveedor');
$routes->get('/view_proveedor', 'AdminMenu::mostrar_borrarProveedor');
$routes->get('/eliminar_proveedor', 'AdminMenu::EliminarProveedor');
//Expedidor
$routes->get('/expedidor', 'AdminMenu::go_expedidor');
$routes->get('/registrar_expedidor', 'AdminMenu::ExpedidorForm');
$routes->get('/mostrar_expedidor', 'AdminMenu::mostrar_expedidor');
$routes->get('/editar_expedidor', 'AdminMenu::guardar_expepidor');
$routes->post('/guardar_expedidor', 'AdminMenu::modificar_expedidor');
$routes->get('/view_expedidor', 'AdminMenu::mostrar_borrarExpedidor');
$routes->get('/eliminar_expedidor', 'AdminMenu::EliminarExpedidor');
//Categoria
$routes->get('/go_categorias','AdminMenu::go_categorias');
$routes->get('/registrar_Categoria', 'AdminMenu::CategoriaForm');
$routes->get('/mostrar_categoria', 'AdminMenu::mostrar_categoria');
$routes->get('/editar_categoria', 'AdminMenu::guardar_categoria');
$routes->post('/guardar_categoria', 'AdminMenu::modificar_categoria');
$routes->get('/view_categoria', 'AdminMenu::mostrar_borrarcategoria');
$routes->get('/eliminar_categoria', 'AdminMenu::EliminarCategoria');
//Empleado
$routes->get('/go_Empleado','AdminMenu::go_Empleado');
$routes->get('/registrar_empleado', 'AdminMenu::EmpleadoForm');
$routes->get('/mostrar_empleado', 'AdminMenu::mostrar_empleado');
$routes->get('/editar_empleado', 'AdminMenu::guardar_empleado');
$routes->post('/guardar_empleado', 'AdminMenu::modificar_empleado');
$routes->get('/view_empleado', 'AdminMenu::mostrar_borrarempleado');





$routes->get('/proveedor', 'AdminMenu::go_proveedor');
$routes->get('/expedidor', 'AdminMenu::go_expedidor');
$routes->post('/insertar_proveedor','AdminMenu::insertar_proveedor');
$routes->post('/insertar_producto','AdminMenu::insertar_producto'); //
// $routes->get('imagen/', 'AdminMenu::mostrarImagen');
$routes->post('/insertar_expedidor','AdminMenu::insertar_expedidor');

$routes->get('/ropas','Ropas::polos');
$routes->get('/Vestidos','Ropas::vestidos');
$routes->get('/Casacas','Ropas::casacas');
$routes->get('/Jeans','Ropas::jeans');
$routes->get('/chalecos','Ropas::chalecos');
$routes->post('/ordenar','Ropas::ordenar');
$routes->get('/ropasC', 'Ropas::redireccionar');
$routes->get('detalles','Home::capturarIDImagen');
$routes->post('compra','Home::enviar_compra');
$routes->post('carrito','Home::carrito');
$routes->post('/insertar_cliente','Home::insertar_cliente');
$routes->post('/generar_orden','Home::generar_orden');
$routes->post('/generar_ordenDetail','Home::generar_ordenDetail');
//categoria
$routes->get('/go_categorias','AdminMenu::go_categorias');
$routes->post('/insertar_categoria','AdminMenu::ingresardatos');
//empleado
$routes->get('/go_empleado','AdminMenu::go_empleado');
$routes->post('/insertar_empleado','AdminMenu::insertarempleado');
$routes->get('/verOrdenes','AdminMenu::verOrdenes');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
