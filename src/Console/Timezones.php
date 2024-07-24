<?php
namespace App\Console;
use App\Models\Timezone;

class Timezones extends Base implements IModel {
  public function entrypoint(): void {
    $this->cli->bold()->out("Timezones");
    $this->radioSection();
  }

  public function list(): void {
    $groups = Timezone::orderBy("start")->get();

    foreach ($groups as $i => $group) {
      $this->cli->inline($i + 1);
      $this->cli->inline(". ");
      $this->cli->out($group->full);
    }
  }

  public function add(): void {
    // Start
    $in = $this->cli->input("Choose a start hour");
    $in->accept(fn ($res) => $this->_checkTimeAnswer($res));
    $start = $in->prompt();

    // Finish
    $in = $this->cli->input("Choose a finish hour");
    $in->accept(fn ($res) => $this->_checkTimeAnswer($res));
    $finish = $in->prompt();

    $tz = new Timezone();
    $tz->start = $start;
    $tz->finish = $finish;
    $ok = $tz->save();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Element created!");
    } else {
      $this->cli->backgroundRed()->error("Could not create timezone!");
    }
  }

  public function delete(): void {
    $tzs = Timezone::all();
    $index = $this->radioModel($tzs, "full");
    $room = $tzs[$index];
    $ok = $room->delete();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Deleted!");
    } else {
      $this->cli->backgroundRed()->error("Could not delete timezone!");
    }
  }

  private function _checkTimeAnswer(string $res): bool {
    $arr = explode(":", $res);

    // Two elements
    if (count($arr) !== 2) {
      return false;
    }

    // Must be numeric
    if (!(is_numeric($arr[0]) && is_numeric($arr[1]))) {
      return false;
    }

    // Each element must be 2 long
    if (!(strlen($arr[0]) === 2 && strlen($arr[1]) === 2)) {
      return false;
    }

    return true;
  }
}
