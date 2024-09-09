<?php
namespace App\Wrappers;

class Cookies {
  public static function offset(): int {
    if (isset($_COOKIE["weekday-offset"]) && !empty($_COOKIE["weekday-offset"]) && is_numeric($_COOKIE["weekday-offset"])) {
      return intval($_COOKIE["weekday-offset"]);
    }
    return Env::weekdayOffset();
  }
}
