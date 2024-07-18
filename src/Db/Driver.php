<?php
namespace App\Db;

use App\Wrappers\Env;
use Medoo\Medoo;

class Driver {
  private Medoo $conn;

  public Schedules $schedules;
  public Subjects $subjects;

  function __construct() {
    $db = Env::db();

    $this->conn = new Medoo([
      ...$db,
      'charset' => 'utf8mb4',
      'collation' => 'utf8mb4_general_ci'
    ]);

    $this->schedules = new Schedules($this->conn);
    $this->subjects = new Subjects($this->conn);
  }
}
