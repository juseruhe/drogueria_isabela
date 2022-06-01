<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Login
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::login');

//admin
$routes->get('/main','Home::main');

// Productos
$routes->get('/productos','ProductoController::index');
$routes->get('/productos/mostrar','ProductoController::mostrarProductos');
$routes->post('/productos','ProductoController::crearProducto');
$routes->get('/productos/(:num)','ProductoController::mostrarProducto/$1');
$routes->put('/productos/(:num)','ProductoController::actualizarProducto/$1');
$routes->delete('/productos/(:num)','ProductoController::eliminarProducto/$1');
$routes->get('/productos/buscar/(:any)','ProductoController::buscarProductoOCodigoBarras/$1');

// Productos-Ventas
$routes->get('/productos_ventas','ProductoVentaController::index');
$routes->get('/productos_ventas/mostrarProductosVentas','ProductoVentaController::mostrarProductosVentas');
$routes->post('/productos_ventas','ProductoVentaController::crearProductoVenta');
$routes->get('/productos_ventas/(:num)','ProductoVentaController::mostrarProductoVenta/$1');
$routes->put('/productos_ventas/(:num)','ProductoVentaController::actualizarProductoVenta/$1');
$routes->delete('/productos_ventas/(:num)','ProductoVentaController::eliminarProductoVenta/$1');
$routes->get('/productos_ventas/total','ProductoVentaController::totalProductoVenta');

// Factura
$routes->get('/factura','FacturaController::index');

// Ventas
$routes->post('/ventas','VentaController::crearVenta');
$routes->get('/ventas','VentaController::index');
$routes->get('/ventas/dia','VentaController::mostrarVentasDia');
$routes->get('/ventas/mes','VentaController::mostrarVentasMes');
$routes->get('/ventas/anio','VentaController::mostrarVentasAnio');
$routes->get('/ventas/total','VentaController::mostrarTotalVentas');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
