<?php
namespace App\Wrappers;
use App\Constants\Weekdays;

class Env {
  public static function parse(string $path): void {
    $arr = parse_ini_file($path);

    if ($arr === false) {
      return;
    }

    foreach ($arr as $key => $val) {
      putenv("$key=$val");
      $_ENV[$key] = $val;
    }
  }

  public static function db(): array {
    $driver = $_ENV["DB_DRIVER"] ?? "mysql";
    $host = $_ENV["DB_HOST"] ?? "127.0.0.1";
    $port = $_ENV["DB_PORT"] ?? 3306;
    $user = $_ENV["DB_USER"] ?? "";
    $password = $_ENV["DB_PASSWORD"] ?? "";
    $name = $_ENV["DB_NAME"] ?? "schedorganizer";

    return [
      "driver" => $driver,
      "host" => $host,
      "port" => $port,
      "database" => $name,
      "username" => $user,
      "password" => $password
    ];
  }

  public static function weekdayOffset(): int {
    if (!(isset($_ENV['APP_WEEKDAY_OFFSET']) && is_numeric($_ENV['APP_WEEKDAY_OFFSET']))) {
      return Weekdays::Sunday->value;
    }

    return intval($_ENV['APP_WEEKDAY_OFFSET']);
  }
}
