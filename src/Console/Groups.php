<?php
namespace App\Console;
use App\Models\Group;

class Groups extends Base implements IModel {
  public function entrypoint(): void {
    $this->cli->bold()->out("Groups");
    $this->radioSection();
  }

  public function list(): void {
    $groups = Group::all();

    foreach ($groups as $i => $group) {
      $this->cli->inline($i + 1);
      $this->cli->inline(". ");
      $this->cli->out($group->full);
    }
  }

  public function add(): void {
    // Start
    $in = $this->cli->input("Choose a year");
    $year = $in->prompt();

    // Finish
    $in = $this->cli->input("Choose a group");
    $group = $in->prompt();

    $grp = new Group();
    $grp->year = $year;
    $grp->group = $group;
    $ok = $grp->save();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Element created!");
    } else {
      $this->cli->backgroundRed()->error("Could not create group!");
    }
  }

  public function delete(): void {
    $groups = Group::all();
    $index = $this->radioModel($groups, "full");
    $room = $groups[$index];
    $ok = $room->delete();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Deleted!");
    } else {
      $this->cli->backgroundRed()->error("Could not delete group!");
    }
  }
}
