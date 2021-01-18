<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
  protected $fillable = ['id', 'title', 'description', 'created_at', 'updated_at'];
}
