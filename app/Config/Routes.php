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
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin/Dasbor::index');
$routes->add('admin/customer', 'Customers::index');
$routes->get('admin/campaigns', 'Admin/Campaigns::sales');
$routes->post('admin/campaigns/submit', 'Admin/Campaigns::submit');
$routes->add('cust-register', 'Customers::register');
$routes->add('voucher', 'Admin/Voucher::index');
//$routes->add('email', 'Admin/Testing::email');
$routes->add('email', 'Admin/Kirim_email::index');
$routes->add('kirim', 'Admin/Kirim_email::send');
$routes->add('kota', 'Admin/Testing::kota');
$routes->add('cek', 'Admin/Testing::cek');
$routes->add('cekitem', 'Admin/Testing::cekitem');
$routes->add('coupon', 'Admin/Testing::coupon');
$routes->add('cekcustomer', 'Admin/Testing::cekcustomer');
$routes->add('wa', 'Admin/Testing::wablast');
$routes->add('entry', 'Admin/Testing::insert');


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
