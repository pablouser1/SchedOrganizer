<?php
namespace App\Console;

class Timezones extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->out("Timezones");
  }
}
