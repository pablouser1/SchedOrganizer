<?php
namespace App\Console;

class Rooms extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->bold()->out("Rooms");
    $this->radioSection();
  }
}
