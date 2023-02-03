<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add(
    'homepage', 
        new Route(constant('URL_SUBFOLDER') . '/',
        array('controller' => 'ToDoItemController', 'method'=>'index'), array())
    );
    $routes->add(
        'add', 
        new Route(constant('URL_SUBFOLDER') . '/add',
        array('controller' => 'ToDoItemController', 'method'=>'add'), array())
    );
    $routes->add(
        'new', 
        new Route(constant('URL_SUBFOLDER') . '/add/new',
        array('controller' => 'ToDoItemController', 'method'=>'new'), array())
    );
    $routes->add(
        'login', 
        new Route(constant('URL_SUBFOLDER') . '/login',
        array('controller' => 'UserController', 'method'=>'login'), array())
    );
    $routes->add(
        'signUp', 
        new Route(constant('URL_SUBFOLDER') . '/login/signUp',
        array('controller' => 'UserController', 'method'=>'signUp'), array())
    );
    $routes->add(
        'complete', 
        new Route(constant('URL_SUBFOLDER') . '/item/{id}/complete',
        array('controller' => 'ToDoItemController', 'method'=>'complete'), array('id' => '[0-9]+'))
    );
    $routes->add(
        'edit', 
        new Route(constant('URL_SUBFOLDER') . '/item/{id}/edit',
        array('controller' => 'ToDoItemController', 'method'=>'edit'), array('id' => '[0-9]+'))
    );
    $routes->add(
        'save', 
        new Route(constant('URL_SUBFOLDER') . '/item/save',
        array('controller' => 'ToDoItemController', 'method'=>'save'), array())
    );
