<?php
namespace App\Console;

class Schedules extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->out("Schedules");
  }
}
