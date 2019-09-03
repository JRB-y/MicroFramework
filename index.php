<?php

/**
 * Bootstrap the Application
 * 
 */
require_once __DIR__ . '/bootstrap.php';

// creating the routes
// TODO: create a separate file for the application

$router->add('/', 'GET', function ($request) {
  echo "Hello";
});

$router->dispatch();
