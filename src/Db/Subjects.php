<?php
namespace App\Db;

class Subjects extends Base {
  public function all(): array {
    $sbjs = $this->conn->select("subjects", [
      // Joins
      "[>]groups" => ["group_id" => "id"]
    ], [
      "subjects.id",
      "subjects.name",
      "subjects.short_name",
      "subjects.url",
      "group" => [
        "groups.id",
        "groups.year",
        "groups.group"
      ]
    ]);

    if ($sbjs === null) {
      return [];
    }

    for ($i = 0; $i < count($sbjs); $i++) {
      $sbjs[$i]["rooms"] = [];
    }

    return $sbjs;
  }
}
