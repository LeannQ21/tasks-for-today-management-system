<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'TasksController::index');
$routes->get('tasks', 'TasksController::tasks');
$routes->get('profile', 'TasksController::profile');
$routes->get('about', 'TasksController::about');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');
$routes->get('tasks/new', 'TasksController::new', ['filter' => 'auth']);
$routes->post('tasks', 'TasksController::create', ['filter' => 'auth']);
$routes->get('tasks/(:num)/edit', 'TasksController::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/update', 'TasksController::update/$1', ['filter' => 'auth']);
$routes->post('tasks/(:num)/archive', 'TasksController::archive/$1', ['filter' => 'auth']);