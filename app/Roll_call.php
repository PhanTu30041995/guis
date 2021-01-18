<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roll_call extends Model
{
  protected $table = 'roll_calls';
  public function users()
  {
      return $this->belongsTo('App\User','user_id');
  }
}
