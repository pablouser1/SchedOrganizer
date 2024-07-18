<?php
namespace App\Controllers;

use App\Db\Driver;
use App\Wrappers\Plates;

class SubjectController {
  public static function all() {
    $db = new Driver();

    $sbjs = $db->subjects->all();

    Plates::render("subjects", ["sbjs" => $sbjs]);
  }
}
