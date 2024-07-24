<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {
  protected $table = 'groups';
  public $timestamps = false;
  protected $appends = ['full'];

  public function getFullAttribute() {
    $year = $this->year;
    $group = $this->group;
    return "{$year}º $group";
  }
}
