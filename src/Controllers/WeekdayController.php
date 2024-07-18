<?php
namespace App\Controllers;

use App\Db\Driver;
use App\Wrappers\Plates;

class WeekdayController {
  public static function get(int $num) {
    $db = new Driver();
    $weekday = date("w");

    $schds = $db->schedules->fromWeekday($num);
    Plates::render("weekday", [
      "schds" => $schds,
      "weekday" => intval($weekday)
    ]);
  }
}
