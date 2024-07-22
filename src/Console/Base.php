<?php
namespace App\Console;
use App\Db\Driver;
use League\CLImate\CLImate;

abstract class Base {
  protected CLImate $cli;
  protected Driver $db;

  function __construct(CLImate $cli, Driver $db) {
    $this->cli = $cli;
    $this->db = $db;
  }

  protected function radio(array $options) {
    $names = array_column($options, 'name');
    $input = $this->cli->radio("Choose an option:", $names);
    $res = $input->prompt();

    $index = array_search($res, $names);
    $runner = $options[$index]["runner"];

    if (is_string($runner[0])) {
      $class = new $runner[0]($this->cli, $this->db);

      $runner = [$class, $runner[1]];
    }

    call_user_func($runner);
  }
}
