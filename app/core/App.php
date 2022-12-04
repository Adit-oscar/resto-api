<?php

namespace Core\App;

require_once 'app/Helper/Response.php';

use Response;

class App
{

  protected $controller = 'Makanan';
  protected $method = 'Index';
  protected $params = [];

  public function __construct()
  {

    $url = $this->parseUrl();

    if ($url !== null) {
      // Configurasi Cotroller
      if (file_exists('app/controller/' . $url[0] . '.php')) {
        $this->controller = $url[0];
        unset($url[0]);
      }

      require_once 'app/controller/' . $this->controller . '.php';
      $this->controller = new $this->controller;

      // Configurasi Method
      if (isset($url[1])) {
        if (method_exists($this->controller, $url[1])) {
          $this->method = $url[1];
          unset($url[1]);
        }
      }

      // Configurasi Params
      if (!empty($url)) {
        $this->params = array_values($url);
      }

      // Configurasi untuk menjalankan controller, method & params
      call_user_func_array([$this->controller, $this->method], $this->params);
    } else {
      $response = new Response();
      $response->url_not_found('fail', 'Url Not Found!', 500);
    }
  }

  public function parseUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
