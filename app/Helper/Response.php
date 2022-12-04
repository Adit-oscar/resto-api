<?php

// namespace Helper\Response;

class Response
{

  public $data = [];
  public $status = '';
  public $message = '';
  public $status_code = 200;

  public function getAllMakananHandler($status, $data, $status_code)
  {

    $response = [
      "status" => $this->status = $status,
      "data" => [
        "makanan" => $this->data = $data
      ]
    ];

    $parse_json = json_encode($response);

    echo $parse_json;

    http_response_code($this->status_code = $status_code);
    return $parse_json;
  }

  public function getMakananByIdHandler($status, $data, $status_code)
  {

    $response = [
      "status" => $this->status = $status,
      "data" => [
        "makanan" => $this->data = $data
      ]
    ];

    $parse_json = json_encode($response);

    echo $parse_json;

    http_response_code($this->status_code = $status_code);
    return $parse_json;
  }

  public function id_not_found_handler($status, $message, $status_code)
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

  public function delete_handler($status, $message, $status_code)
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
