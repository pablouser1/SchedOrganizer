<?php
namespace App\Console;

class Subjects extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->out("Subjects");
  }
}
