<?php

namespace app\Helper\Response;

class Response
{

  protected $status = "";
  protected $data = [];
  protected $message = "";
  protected $status_code = 200;

  public function response_addMakanan($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_failAddMakanan($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_field_empty($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_idNotFound($status, $message, $status_code)
  {

    $respon = [
      "status" => $this->status = $status,
      "message" => $this->message = $message
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_getMakanan($status, $data, $status_code)
  {

    $respon = [
      "status" => $this->status = $status,
      "data" => [
        "makanan" => $this->data = $data
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_deleteMakanan($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_updateMakanan($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function response_notFound($status, $message, $status_code)
  {

    $respon = [
      "data" => [
        "status" => $this->status = $status,
        "message" => $this->message = $message
      ]
    ];

    $json_data = json_encode($respon, 1, JSON_PRETTY_PRINT);

    echo $json_data;

    header('Content-Type: application/json');
    http_response_code($this->status_code = $status_code);
    return $json_data;
  }

  public function controller_not_found($status, $message, $status_code)
  {

    $response = [
      "status" => $this->status = $status,
      "message" => $this->message = $message
    ];

    $parse_json = json_encode($response);

    echo $parse_json;

    http_response_code($this->status_code = $status_code);
    return $parse_json;
  }

  public function url_not_found($status, $message, $status_code)
  {

    $response = [
      "status" => $this->status = $status,
      "message" => $this->message = $message
    ];

    $parse_json = json_encode($response);

    echo $parse_json;

    http_response_code($this->status_code = $status_code);
    return $parse_json;
  }

  public function method_not_found($status, $message, $status_code)
  {

    $response = [
      "status" => $this->status = $status,
      "message" => $this->message = $message
    ];

    $parse_json = json_encode($response);

    echo $parse_json;

    http_response_code($this->status_code = $status_code);
    return $parse_json;
  }
}
