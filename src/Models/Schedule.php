<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model {
  protected $table = 'schedules';
  public $timestamps = false;

  public function subject(): HasOne {
    return $this->hasOne(Subject::class, "id", "subject_id");
  }

  public function timezone(): HasOne {
    return $this->hasOne(Timezone::class, "id", "timezone_id");
  }
}
