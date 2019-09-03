<?php

use Jrb\Router\Router;
use Jrb\Request\Request;

/**
 * Bootstrap the Application.
 * 
 * Composer Autoloader.
 * Request.
 * Router. (TODO: Create a separate file for adding the routes)
 * Add routes.
 * Dispatch the router.
 * 
 */
require __DIR__ . '/../vendor/autoload.php';


// new request (Available in all the Application)
$request = new Request();

// new router (Available in al the Application)
$router = new Router($request);
