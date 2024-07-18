<?php
namespace App\Wrappers;

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
    $user = $_ENV["DB_USER"] ?? "";
    $password = $_ENV["DB_PASSWORD"] ?? "";
    $name = $_ENV["DB_NAME"] ?? "schedorganizer";

    return [
      "type" => $driver,
      "host" => $host,
      "database" => $name,
      "username" => $user,
      "password" => $password
    ];
  }
}
