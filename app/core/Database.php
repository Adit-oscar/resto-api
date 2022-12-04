<?php

namespace Core\Database;

use mysqli;

class Database
{

  private $host = HOST;
  private $user = USER;
  private $pass = PASS;
  private $dbname = DBNAME;

  protected $db;

  public function __construct()
  {

    $this->db = $this->db();
  }

  public function db()
  {

    $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    return $conn;
  }
}
