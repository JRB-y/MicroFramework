<?php

namespace Jrb\Router;

use Closure;
use Jrb\Request\Request;

/**
 * How to use this Router?
 * 
 * 1. We first need to add our routes:
 * $router->add($action, $method, $callback)
 * for the moment $method can be only GET or POST.
 * 
 * 2. We need to dispatch our router:
 * $router->dispatch();
 * 
 */
class Router
{

  /**
   * $routes
   *
   * @var array
   */
  public $routes = [];

  /**
   * The supported Method in the Router.
   * TODO: Add more methods like PATCH, DELETE
   *
   * @var array
   */
  private $supportedHttpMethods = ["GET", "POST"];

  /**
   * $request
   *
   * @var Request $request
   */
  private $request;

  /**
   * __construct
   *
   * @param Request $request
   * @return void
   */
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  /**
   * Add a new route to the Router
   *
   * @param string $action
   * @param string $method
   * @param Closure $callback
   * @return void
   */
  public function add(string $action, string $method, Closure $callback)
  {
    $this->routes[] = ['action' => $action, 'method' => strtoupper($method), 'callback' => $callback];
  }

  /**
   * Make the router work.
   * This method need to be called for the Router to work.
   *
   * @return void
   */
  public function dispatch()
  {
    // loop throw the routes
    foreach ($this->routes as $route) {
      // check if the current route (request_uri) match with the delared routes (action and method)
      if ($this->request->request_uri === $route['action'] && $this->request->request_method === $route['method']) {
        // check if the method is support in the router
        if (in_array($route['method'], $this->supportedHttpMethods))
          // fire the callback function and pass the request body as an array
          // TODO: It's better to have the request body as an Object (need to refactor the Request class)
          return call_user_func_array($route['callback'], [$this->request->getBody()]);
      }
    }
    // if the current route don't match any routes
    $this->invalidMethodHandler();
  }

  /**
   * If the current route didn't match any of the add routes.
   *
   * @return void
   */
  public function invalidMethodHandler()
  {
    header("{$this->request->request_uri} 404 Not Found");
    echo "{$this->request->request_uri} 404 Not Found";
  }
}
