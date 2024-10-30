<?php
namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes =  Services::routes();

// Load the built-in Shield authentication routes

service('auth')->routes($routes);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register_student', 'Register::index');
$routes->post('/register_student/saveStudent', 'Register::saveStudent');
$routes->add('students/edit/(:any)', to: 'Register::edit/$1');
$routes->add('students/delete/(:any)', 'Register::delete/$1');
$routes->get('view_students/', 'Register::view_students');
$routes->get('students/view/(:any)', 'Register::view/$1');
