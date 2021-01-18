<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  protected $fillable = ['id', 'config_key', 'config_value', 'created_at', 'updated_at'];
}
