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


  public function addMakanan()
  {
  }

  public function getAllMakanan()
  {

    if ($this->request_method() === 'GET') {

      $data = $this->model->getAllMakanan();

      $arrData = [];
      while ($datas = $data->fetch_assoc()) {
        $arrData[] = $datas;
      }

      $this->helper->getAllMakananHandler('success', $arrData, 200);
    } else {

      $this->helper->method_not_found('fail', 'Method Not Found!', 404);
    }
  }

  public function getMakananById($id = '')
  {

    if ($this->request_method() === 'GET') {

      if (!empty($id)) {

        $data = $this->model->getMakananById($id);

        if ($data->num_rows == 1) {
          $datas = $data->fetch_assoc();

          $this->helper->getMakananByIdHandler('success', $datas, 200);
        } else {
          $this->helper->id_not_found_handler('fail', "Data dengan id: {$id} tidak ditemukan!", 404);
        }
      } else {
        $this->helper->id_not_found_handler('fail', "Parameter id harus diisi!", 404);
      }
    } else {
      $this->helper->method_not_found('fail', 'Method Not Found!', 404);
    }
  }

  public function deleteMakanan($id = '')
  {

    if (!empty($id)) {

      $status = $this->model->delete_makanan($id);

      if ($status === true) {
        $this->helper->delete_handler('success', "data dengan id: {$id} berhasil dihapus", 200);
      } else {
        $this->helper->id_not_found_handler('fail', "Data dengan id: {$id} tidak ditemukan!", 404);
      }
    } else {
      $this->helper->id_not_found_handler('fail', "Parameter id harus diisi!", 400);
    }
  }
}
