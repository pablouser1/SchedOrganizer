<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model {
  protected $table = 'timezones';
  public $timestamps = false;
  protected $appends = ['full'];

  public function getFullAttribute() {
    $start = $this->start;
    $finish = $this->finish;
    return "$start - $finish";
  }
}
