<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {
  protected $table = 'rooms';
  public $timestamps = false;
  protected $appends = ['full'];

  public function getFullAttribute() {
    $location = $this->location;
    $desc = $this->description;
    return "$location ($desc)";
  }
}
