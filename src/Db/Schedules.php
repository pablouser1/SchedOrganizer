<?php
namespace App\Db;

class Schedules extends Base {
  public function fromWeekday(int $weekday): array {
    $res = $this->conn->select("schedules", [
      // Joins
      "[><]subjects" => ["subject_id" => "id"],
      "[><]timezones" => ["timezone_id" => "id"]
    ], [
      // Return map
      "schedules.id",
      "schedules.weekday",
      "subject" => [
        "subjects.id",
        "subjects.name",
        "subjects.short_name",
        "subjects.url"
      ],
      "timezone" => [
        "timezones.id",
        "timezones.start",
        "timezones.finish"
      ]
    ], [
      // Order
      "ORDER" => [
        "timezones.start"
      ],
      // Where
      "schedules.weekday[=]" => $weekday
    ]);

    if ($res === null) {
      return [];
    }

    return $res;
  }
}
