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
          "harga" => $dataMakanan['harga_makanan'],
          // "gambar" => '../resto-api/assets/img/makanan/' . $dataMakanan['foto']
        ];

        $this->helper->response_getMakanan("success", $data, 200);
      } else {

        $this->helper->response_idNotFound("fail", "Data dengan id:{$id} tidak ditemukan", 404);
      }
    } else {
      $this->helper->response_idNotFound('fail', 'Id tidak boleh kosong!', 400);
    }
  }

  // function addMakanan()
  // {
  //   global $db;

  //   $nama_makanan = isset($_POST['nama_makanan']) ? $_POST['nama_makanan'] : '';
  //   $harga_makanan = isset($_POST['harga_makanan']) ? $_POST['harga_makanan'] : '';

  //   // konfigurasi untuk mendapatkan foto
  //   if (isset($_FILES['foto']['name'])) {
  //     $foto_tmp = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : '';
  //     $foto_name = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';
  //   } else {
  //     $foto_name = isset($_POST['foto']) ? $_POST['foto'] : '';
  //     $ekstensi = isset($_POST['ekstensi']) ? $_POST['ekstensi'] : '';
  //     $foto = base64_decode($foto_name);
  //   }

  //   if ($nama_makanan !== '' && $harga_makanan !== '' && $foto_name !== '') {

  //     $new_names = rename_foto($foto_name, $nama_makanan);

  //     $sql = "INSERT INTO makanan VALUES ('', '$nama_makanan', '$harga_makanan', '$new_names')";
  //     $query = $db->query($sql);
  //     if ($query === true) {

  //       file_put_contents('../resto-api/assets/img/makanan/' . $new_names . $ekstensi, $foto);

  //       // memindahkan gambar kedalam path direktori penyimpanan
  //       move_uploaded_file($foto_tmp, '../resto-api/assets/img/makanan/' . $new_names);

  //       $response = new Response("success", "", "Data berhasil ditambahkan", 201);
  //       return $response->response_addMakanan();
  //     } else {

  //       $response = new Response("fail", "", "Data gagal ditammbahkan", 400);
  //       return $response->response_failAddMakanan();
  //     }
  //   } elseif ($nama_makanan == '') {

  //     $response = new Response("fail", "", "Field nama tidak boleh kosong", 400);
  //     return $response->response_failAddMakanan();
  //   } elseif ($harga_makanan == '') {

  //     $response = new Response("fail", "", "Field harga tidak boleh kosong", 400);
  //     return $response->response_failAddMakanan();
  //   } elseif ($foto_name == '') {

  //     $response = new Response("fail", "", "Field foto tidak boleh kosong", 400);
  //     return $response->response_failAddMakanan();
  //   } else {

  //     $response = new Response("fail", "", "Gagal menambahkan makanan, semua field harus diisi!", 400);
  //     return $response->response_field_empty();
  //   }
  // }

  // function editMakanan($id)
  // {
  //   global $db;

  //   $nama_makanan = isset($_POST['nama_makanan']) ? $_POST['nama_makanan'] : '';
  //   $harga_makanan = isset($_POST['harga_makanan']) ? $_POST['harga_makanan'] : '';

  //   // konfigurasi untuk mendapatkan foto
  //   $foto_tmp = $_FILES['foto']['tmp_name'];
  //   $foto_name = $_FILES['foto']['name'];

  //   if ($foto_name !== '') {


  //     $sql = "SELECT * FROM makanan WHERE id='$id'";
  //     $data = $db->query($sql);

  //     if ($data->num_rows == 1) {

  //       if ($nama_makanan !== '' && $harga_makanan !== '' && $foto_name !== '') {

  //         $new_names = rename_foto($foto_name, $nama_makanan);

  //         // menghapus foto lama
  //         $foto_lama = $data->fetch_assoc();
  //         unlink('../resto-api/assets/img/makanan/' . $foto_lama['foto']);

  //         $sql = "UPDATE makanan SET nama_makanan='$nama_makanan', harga_makanan='$harga_makanan', foto='$new_names' WHERE id='$id'";
  //         $query = $db->query($sql);
  //         if ($query === true) {

  //           // pindahkan foto kedalam folder penyimpanan
  //           move_uploaded_file($foto_tmp, '../resto-api/assets/img/makanan/' . $new_names);

  //           $response = new Response("success", "", "Data berhasil diupdate", 200);
  //           return $response->response_updateMakanan();
  //         } else {

  //           $response = new Response("success", "", "Data gagal diupdate", 400);
  //           return $response->response_updateMakanan();;
  //         }
  //       } else {
  //         $response = new Response("fail", "", "Gagal update makanan, semua field harus diisi!", 400);
  //         return $response->response_field_empty();
  //       }
  //     } else {

  //       $response = new Response("fail", "", "Gagal update makanan, id tidak ditemukan", 400);
  //       return $response->response_idNotFound();
  //     }
  //   } else {

  //     $sql = "SELECT * FROM makanan WHERE id='$id'";
  //     $data = $db->query($sql);

  //     if ($data->num_rows == 1) {

  //       if ($nama_makanan !== '' && $harga_makanan !== '') {

  //         $foto = $data->fetch_assoc();
  //         $foto_lama = $foto['foto'];

  //         $sql = "UPDATE makanan SET nama_makanan='$nama_makanan', harga_makanan='$harga_makanan', foto='$foto_lama' WHERE id='$id'";
  //         $query = $db->query($sql);
  //         if ($query === true) {

  //           $response = new Response("success", "", "Data berhasil diupdate", 200);
  //           return $response->response_updateMakanan();
  //         } else {

  //           $response = new Response("success", "", "Data gagal diupdate", 400);
  //           return $response->response_updateMakanan();;
  //         }
  //       } else {
  //         $response = new Response("fail", "", "Gagal update makanan, semua field harus diisi!", 400);
  //         return $response->response_field_empty();
  //       }
  //     } else {

  //       $response = new Response("fail", "", "Gagal update makanan, id tidak ditemukan", 400);
  //       return $response->response_idNotFound();
  //     }
  //   }
  // }

  // public function deleteMakanan($id)
  // {

  //   if (!empty($id)) {

  //     $sql = "SELECT * FROM makanan WHERE id='$id'";
  //     $data = $db->query($sql);

  //     if ($data->num_rows == 1) {

  //       // menghapus foto dari direktori penyimpanan
  //       $foto = $data->fetch_assoc();
  //       unlink('../resto-api/assets/img/makanan/' . $foto['foto']);

  //       // menghapus data dari database
  //       $sql = "DELETE FROM makanan WHERE id='$id'";
  //       $status = $db->query($sql);

  //       if ($status === true) {

  //         $response = new Response("success", "", "Data berhasil dihapus", 200);
  //         return $response->response_deleteMakanan();
  //       } else {

  //         $response = new Response("fail", "", "Data gagal dihapus!", 400);
  //         return $response->response_deleteMakanan();
  //       }
  //     } else {

  //       $response = new Response("fail", "", "Data dengan id:{$id} tidak ditemukan", 400);
  //       return $response->response_idNotFound();
  //     }
  //   } else {
  //     $response = new Response("fail", "", "Data gagal dihapus, silahkan masukan id", 400);
  //     return $response->response_idNotFound();
  //   }
  // }
}
