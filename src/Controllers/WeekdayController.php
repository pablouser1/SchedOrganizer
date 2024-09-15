<?php
namespace App\Controllers;

use App\Models\Schedule;
use App\Wrappers\Plates;

class WeekdayController {
  public static function index(int $num) {
    $weekday = date('w');

    $schds = Schedule::withAggregate('timezone', 'start')->where('weekday', '=', $num)->orderBy('timezone_start')->get();

    Plates::render('weekday', [
      'schds' => $schds,
      'weekday' => intval($weekday)
    ]);
  }
}
