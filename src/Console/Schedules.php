<?php
namespace App\Console;
use App\Constants\Weekdays;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Timezone;

class Schedules extends Base implements IModel {
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

  public function add(): void {
    // Weekday
    $weekday = $this->radioEnum(Weekdays::cases());

    // Timezone
    $tzs = Timezone::orderBy("start")->get();
    $index = $this->radioModel($tzs, "full");
    $tz = $tzs[$index];

    // Subject
    $sbjs = Subject::all();
    $index = $this->radioModel($sbjs, "name");
    $sbj = $sbjs[$index];

    $schd = new Schedule();
    $schd->weekday = $weekday;
    $schd->timezone_id = $tz->id;
    $schd->subject_id = $sbj->id;
    $ok = $schd->save();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Element created!");
    } else {
      $this->cli->backgroundRed()->error("Could not create schedule!");
    }
  }

  public function delete(): void {
    $schds = Schedule::withAggregate("timezone", "start")->orderBy("weekday")->orderBy("timezone_start")->get();
    // TODO: Do not use ID
    $index = $this->radioModel($schds, "id");
    $schd = $schds[$index];

    $ok = $schd->delete();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Deleted!");
    } else {
      $this->cli->backgroundRed()->error("Could not delete schedule!");
    }
  }
}
