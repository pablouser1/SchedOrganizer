<?php
namespace App\Console;
use App\Models\Room;

class Rooms extends Base implements IModel {
  public function entrypoint(): void {
    $this->cli->bold()->out("Rooms");
    $this->radioSection();
  }

  public function list(): void {
    $rooms = Room::all();

    foreach ($rooms as $i => $room) {
      $this->cli->inline($i + 1);
      $this->cli->inline(". ");
      $this->cli->out($room->full);
    }
  }

  public function add(): void {
    // Location
    $in = $this->cli->input("Choose a location");
    $location = $in->prompt();

    // Short name
    $in = $this->cli->input("Write a description");
    $desc = $in->prompt();

    $room = new Room();
    $room->location = $location;
    $room->description = $desc;
    $ok = $room->save();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Element created!");
    } else {
      $this->cli->backgroundRed()->error("Could not create room!");
    }
  }

  public function delete(): void {
    $rooms = Room::all();
    $index = $this->radioModel($rooms, "full");
    $room = $rooms[$index];
    $ok = $room->delete();
    if ($ok) {
      $this->cli->backgroundGreen()->out("Deleted!");
    } else {
      $this->cli->backgroundRed()->error("Could not delete room!");
    }
  }
}
