<?php

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
require_once __DIR__ . '/vendor/autoload.php';

use Jrb\Router\Router;
use Jrb\Request\Request;

// new request (Available in all the Application)
$request = new Request();

// new router (Available in al the Application)
$router = new Router($request);
