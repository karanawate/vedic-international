<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


/*

$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');

/* login Routes */
$routes->get('/register', 'Home::register');
$routes->post('/register-submit', 'Home::registerUser');

/* login Routes */
$routes->get('/login', 'Home::loginUser');
$routes->get('logout', 'Home::logout_user');
$routes->post('/login-submit', 'Home::check_login');

/* gallery Routes */
$routes->get('add-blogs','Home::blog_created');
$routes->get('view-blog','Home::views_blogs');
$routes->get('blog/delete/(:num)', 'Home::blog_delete/$1');
$routes->post('blog-submit','Home::blog_submit');
$routes->post('blog-edit', 'Home::blog_edit');

/* gallery Routes */
$routes->get('add-gallery','GalleryController::index');
$routes->get('view-gallery','GalleryController::view_gallery');
$routes->post('gallery-submit', 'GalleryController::galleryAdd');

/*
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
