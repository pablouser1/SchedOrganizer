<?php
namespace App\Db;

use Medoo\Medoo;

abstract class Base {
  protected Medoo $conn;
  function __construct(Medoo $conn) {
    $this->conn = $conn;
  }
}
