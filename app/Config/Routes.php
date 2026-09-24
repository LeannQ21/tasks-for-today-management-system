<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'TasksController::index');
$routes->get('tasks', 'TasksController::tasks');
$routes->get('profile', 'TasksController::profile');
$routes->get('about', 'TasksController::about');
