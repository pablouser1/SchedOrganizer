<?php
namespace App\Wrappers;

use App\Constants\App;
use League\Plates\Engine;

class Plates {
  public static function render(string $template, array $data = []) {
    $engine = new Engine(__DIR__ . '/../../templates');

    $engine->registerFunction("version", function (): string {
      return App::VERSION;
    });

    echo $engine->make($template, $data);
  }
}
