<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model {
  protected $table = 'subjects';
  public $timestamps = false;

  public function group(): HasOne {
    return $this->hasOne(Group::class, "id", "group_id");
  }

  public function rooms(): BelongsToMany {
    return $this->belongsToMany(Room::class, "subjects_rooms", "subject_id", "room_id");
  }
}
