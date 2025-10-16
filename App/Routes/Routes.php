<?php

//------------------------------------------------
// Create Router
//------------------------------------------------
$router = new \App\Core\Router();

//------------------------------------------------
// Set Routes GET
//------------------------------------------------
$router->get('/', 'Home@index');
$router->get('/user/create', 'User@create');
$router->get('/user/[0-9]+', 'User@show');
$router->get('/user/delete/[0-9]+', 'User@destroy');
$router->get('/login', 'Login@index');
$router->get('/logout', 'Login@destroy');
// $router->get('/user/[0-9]+/name/[a-z]+', 'User@show');

//------------------------------------------------
// Set Routes POST
//------------------------------------------------
$router->post('/login', 'Login@store');
$router->post('/user/[0-9]+', 'User@save');
$router->post('/user/store', 'User@store');

//------------------------------------------------
// Start Router
//------------------------------------------------
$router->run();

// End Routes ------------------------------------
//------------------------------------------------
