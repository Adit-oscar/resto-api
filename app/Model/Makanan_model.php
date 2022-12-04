<?php

use core\Database\Database;

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
}
