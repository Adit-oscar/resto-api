<?php

use Core\Database\Database;

class Makanan_model extends Database
{

  public function getAllMakanan()
  {
    $sql = "SELECT * FROM makanan";
    $data = $this->db->query($sql);

    return $data;
  }

  public function getMakananById($id)
  {
    $sql = "SELECT * FROM makanan WHERE id='$id'";
    $data = $this->db->query($sql);

    return $data;
  }

  public function delete_makanan($id)
  {
    $sql = "DELETE FROM makanan WHERE id='$id'";
    $data = $this->db->query($sql);

    return $data;
  }

  public function add_makanan($data)
  {

    $nama_makanan = $data['nama'];
    $harga_makanan = $data['harga'];

    $sql = "INSERT INTO makanan VALUES ('', '$nama_makanan', '$harga_makanan')";
    $query = $this->db->query($sql);

    return $query;
  }
}
