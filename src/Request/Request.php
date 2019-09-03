<?php

namespace Jrb\Request;

class Request
{

  public $request;

  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    $this->bootstrap();
  }

  /**
   * bootstrap
   *
   * @return void
   */
  public function bootstrap()
  {
    foreach ($_SERVER as $key => $val) {
      $this->{strtolower($key)} = $val;
    }
  }

  /**
   * getBody
   *
   * @return void
   */
  public function getBody()
  {
    if ($this->request_method === "GET") {
      return null;
    }

    if ($this->request_method === "POST") {
      $body = array();
      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    return $body;
  }
}
