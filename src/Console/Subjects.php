<?php
namespace App\Console;
use App\Models\Group;
use App\Models\Room;
use App\Models\Subject;

class Subjects extends Base implements IModel {
  public function entrypoint(): void {
    $this->cli->bold()->out("Subjects");
    $this->radioSection();
  }

  public function list(): void {
    $subjects = Subject::all();
    $this->cli->border();
    foreach ($subjects as $subject) {
      $this->cli->inline($subject->id);
      $this->cli->inline(". ");
      $this->cli->bold()->inline($subject->name);
      $this->cli->inline(" (");
      $this->cli->inline($subject->group->full);
      $this->cli->out(")");
    }
    $this->cli->border();
  }

  public function add(): void {
    // Group
    $groups = Group::all();

    if ($groups->isEmpty()) {
      $this->cli->backgroundRed()->error("No groups found!");
      return;
    }

    $index = $this->radioModel($groups, "full");
    $group = $groups[$index];

    // Rooms
    $addedRooms = [];
    $rooms = Room::all();
    $options = [];

    foreach ($rooms as $i => $room) {
      $options["i-$i"] = $room->full;
    }

    $in = $this->cli->checkboxes("Choose one or more room(s)", $options);
    $values = $in->prompt();

    foreach ($values as $val) {
      $index = explode("-", $val)[1];
      $room = $rooms[$index];
      $addedRooms[] = $room;
    }

    // Name
    $in = $this->cli->input("Choose a name");
    $name = $in->prompt();

    // Short name
    $in = $this->cli->input("Choose a short name");
    $short_name = $in->prompt();

    // Url
    $in = $this->cli->input("Choose a URL");
    $in->defaultTo(null);
    $url = $in->prompt();

    // Create subject
    $sbj = new Subject();
    $sbj->name = $name;
    $sbj->short_name = $short_name;
    $sbj->url = $url;
    $sbj->group_id = $group->id;
    $success = $sbj->save();
    if ($success) {
      $sbj->rooms()->sync($addedRooms);
      $this->cli->backgroundGreen()->out("Element created!");
    } else {
      $this->cli->backgroundRed()->error("Could not create subject!");
    }
  }

  public function delete(): void {
    $subjects = Subject::all();
    $index = $this->radioModel($subjects, "name");
    $sbj = $subjects[$index];

    $success = $sbj->delete();
    if ($success) {
      $this->cli->backgroundGreen()->out("Deleted!");
    } else {
      $this->cli->backgroundRed()->error("Could not delete subject!");
    }
  }
}
