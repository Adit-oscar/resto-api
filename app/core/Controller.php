<?php

namespace Core\Controller;

class Controller
{
  public function model($class)
  {
    require_once 'app/Model/' . $class . '.php';
    return new $class;
  }

  public function helper($class)
  {
    require_once 'app/Helper/' . $class . '.php';
    return new $class;
  }

  public function request_method()
  {

    $req_method = $_SERVER['REQUEST_METHOD'];
    return $req_method;
  }
}
