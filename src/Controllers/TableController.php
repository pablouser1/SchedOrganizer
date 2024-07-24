<?php
namespace App\Controllers;
use App\Constants\Weekdays;
use App\Wrappers\Cookies;
use App\Wrappers\Plates;

class TableController {
  public static function get() {
    $weekday_offset = Cookies::offset();
    $weekdays = Weekdays::ordered($weekday_offset);
    Plates::render("table", [
      "weekdays" => $weekdays
    ]);
  }
}
