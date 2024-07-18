<?php
namespace App\Constants;

enum Weekdays: int {
  case Sunday = 0;
  case Monday = 1;
  case Tuesday = 2;
  case Wednesday = 3;
  case Thursday = 4;
  case Friday = 5;
  case Saturday = 6;

  public static function ordered(int $offset): array {
    $cases = self::cases();
    $head = array_slice($cases, $offset);
    $tail = array_slice($cases, 0, $offset);

    $orderedWeekdays = [...$head, ...$tail];
    return $orderedWeekdays;
  }
}
