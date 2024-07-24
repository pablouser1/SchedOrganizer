<?php
namespace App\Console;

class Groups extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->bold()->out("Groups");
    $this->radioSection();
  }
}
