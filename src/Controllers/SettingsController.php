<?php
namespace App\Controllers;

use App\Constants\Weekdays;
use App\Wrappers\Cookies;
use App\Wrappers\Plates;

class SettingsController {
  public static function get() {
    $weekdays = Weekdays::cases();
    $weekday_offset = Cookies::offset();
    Plates::render('settings', [
      'weekdays' => $weekdays,
      'offset' => $weekday_offset
    ]);
  }

  public static function post() {
    if (!(isset($_POST['weekday-offset']) && !empty($_POST['weekday-offset']) && is_numeric($_POST['weekday-offset']))) {
      echo 'Invalid data!';
      return;
    }

    $offset = $_POST['weekday-offset'];

    setcookie('weekday-offset', $offset, [
      'httponly' => true,
      'secure' => true,
      'expires' => time()+60*60*24*30
    ]);

    header('Location: /settings');
  }
}
