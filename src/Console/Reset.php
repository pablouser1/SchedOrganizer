<?php
namespace App\Console;
use App\Models\Group;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Subject;

class Reset extends Base implements IBase {
  public function entrypoint(): void {
    $this->radio([
      [
        "name" => "New semester",
        "runner" => [$this, "newSemester"]
      ],
      [
        "name" => "New year",
        "runner" => [$this, "newYear"]
      ]
    ]);
  }

  public function newSemester(): void {
    $this->cli->inline("Are you sure you want to continue? This action will delete all schedules and subjects the database.");
    $this->cli->inline(" ");
    $this->cli->backgroundRed()->out("This action CANNOT BE REVERSED");
    $in = $this->cli->confirm("Continue?");

    if ($in->confirmed()) {
      $this->cli->out("Wiping...");
      $schds = Schedule::all();
      foreach ($schds as $schd) {
        $schd->delete();
      }

      $sbjs = Subject::all();
      foreach ($sbjs as $sbj) {
        $sbj->delete();
      }
      $this->cli->out("Finished!");
    } else {
      $this->cli->bold()->out("Cancelling!");
    }
  }

  public function newYear(): void {
    $this->cli->inline("Are you sure you want to continue? This action will delete everyting except timezones from the database.");
    $this->cli->inline(" ");
    $this->cli->backgroundRed()->out("This action CANNOT BE REVERSED");
    $in = $this->cli->confirm("Continue?");

    if ($in->confirmed()) {
      $this->cli->out("Wiping...");
      $schds = Schedule::all();
      foreach ($schds as $schd) {
        $schd->delete();
      }

      $sbjs = Subject::all();
      foreach ($sbjs as $sbj) {
        $sbj->delete();
      }

      $groups = Group::all();
      foreach ($groups as $group) {
        $group->delete();
      }

      $rooms = Room::all();
      foreach ($rooms as $room) {
        $room->delete();
      }
      $this->cli->out("Finished!");
    } else {
      $this->cli->bold()->out("Cancelling!");
    }
  }
}
