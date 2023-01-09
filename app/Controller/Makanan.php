<?php

use Core\Controller\Controller;

class Makanan extends Controller
{

  private $model;
  private $helper;

  public function __construct()
  {
    $this->model = $this->model('Makanan_model');
    $this->helper = $this->helper('Response');
  }

  public function index()
  {
    $this->helper->controller_not_found('fail', 'Controller / Method Not Found!', 404);
  }

  public function getMakanan()
  {

    if ($this->request_method() === 'GET') {

      $data = $this->model->getAllMakanan();

      $dataMakanan = [];
      while ($dataa = $data->fetch_assoc()) {
        $dataMakanan[] = $dataa;
      }

      $map_data = array_map(function ($data) {
        $makanan = [
          "id" => $data['id'],
          "nama_makanan" => $data['nama_makanan']
        ];

        return $makanan;
      }, $dataMakanan);

      $this->helper->response_getMakanan('success', $map_data, 200);
    } else {
      $this->helper->method_not_found('fail', 'Request Method Not Found', 400);
    }
  }

  public function getMakananById($id = '')
  {

    if ($id !== '') {

      $data = $this->model->getMakananById($id);

      if ($data->num_rows == 1) {

        $dataMakanan = $data->fetch_assoc();

        $data = [
          "id" => $dataMakanan['id'],
          "nama" => $dataMakanan['nama_makanan'],
          "harga" => $dataMakanan['harga_makanan']
        ];

        $this->helper->response_getMakanan("success", $data, 200);
      } else {

        $this->helper->response_idNotFound("fail", "Data dengan id:{$id} tidak ditemukan", 404);
      }
    } else {
      $this->helper->response_idNotFound('fail', 'Id tidak boleh kosong!', 400);
    }
  }

  function addMakanan()
  {

    $nama_makanan = isset($_POST['nama_makanan']) ? $_POST['nama_makanan'] : '';
    $harga_makanan = isset($_POST['harga_makanan']) ? $_POST['harga_makanan'] : '';

    if ($nama_makanan !== '' && $harga_makanan !== '') {

      $data = [
        "nama" => $nama_makanan,
        "harga" => $harga_makanan
      ];

      $query = $this->model->add_makanan($data);

      if ($query === true) {

        $response = $this->helper->response_addMakanan("success", "Data berhasil ditambahkan", 201);
        return $response;
      } else {

        $response = $this->helper->response_failAddMakanan("fail", "Data gagal ditambahkan", 400);
        return $response;
      }
    } elseif ($nama_makanan == '') {

      $response = $this->helper->response_failAddMakanan("fail", "Data gagal ditambahkan, field nama_makanan tidak boleh kosong", 400);
      return $response;
    } elseif ($harga_makanan == '') {

      $response = $this->helper->response_failAddMakanan("fail", "Data gagal ditambahkan, field harga_makanan tidak boleh kosong", 400);
      return $response;
    } else {

      $response = $this->helper->response_failAddMakanan("fail", "Data gagal ditambahkan, field tidak boleh kosong", 400);
      return $response->response_field_empty();
    }
  }
}
