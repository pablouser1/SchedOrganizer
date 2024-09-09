<?php
namespace App\Controllers;

use App\Constants\Weekdays;
use App\Wrappers\Cookies;
use App\Wrappers\Plates;

class HomeController {
  public static function get() {
    $offset = Cookies::offset();
    $weekdays = Weekdays::ordered($offset);
    $weekday_now = date('w');

    Plates::render('home', [
      'weekdays' => $weekdays,
      'weekday_now' => intval($weekday_now),
      'offset' => $offset
    ]);
  }
}
