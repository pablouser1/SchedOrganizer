<?php
namespace App\Console;
use App\Constants\Weekdays;
use App\Models\Schedule;

class Schedules extends Base implements IBase {
  public function entrypoint(): void {
    $this->cli->bold()->out("Schedules");
    $this->radioSection();
  }

  public function list(): void {
    $schds = Schedule::withAggregate("timezone", "start")->orderBy("weekday")->orderBy("timezone_start")->get();

    foreach ($schds as $i => $schd) {
      $this->cli->inline($i + 1);
      $this->cli->inline(". ");
      $this->cli->inline($schd->subject->name);
      $this->cli->inline(" - ");
      $this->cli->bold()->inline(Weekdays::from($schd->weekday)->name);
      $this->cli->inline(" (");
      $this->cli->inline($schd->timezone->full);
      $this->cli->out(")");
    }
  }
}
