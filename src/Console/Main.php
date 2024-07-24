<?php
namespace App\Console;

class Main extends Base implements IBase {
  private const OPTIONS = [
    [
      "name" => "Subjects",
      "runner" => [Subjects::class, "entrypoint"]
    ],
    [
      "name" => "Schedules",
      "runner" => [Schedules::class, "entrypoint"]
    ],
    [
      "name" => "Rooms",
      "runner" => [Rooms::class, "entrypoint"]
    ],
    [
      "name" => "Groups",
      "runner" => [Groups::class, "entrypoint"]
    ],
    [
      "name" => "Timezones",
      "runner" => [Timezones::class, "entrypoint"]
    ],
    [
      "name" => "Wipe",
      "runner" => [Wipe::class, "entrypoint"]
    ]
  ];

  public function entrypoint(): void {
    $this->cli->bold()->out("Welcome to SchedManager!");
    $this->radio(self::OPTIONS);
  }
}
