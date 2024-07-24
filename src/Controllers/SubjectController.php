<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Wrappers\Plates;

class SubjectController {
  public static function all() {
    $sbjs = Subject::all();

    Plates::render("subjects", ["sbjs" => $sbjs]);
  }
}
