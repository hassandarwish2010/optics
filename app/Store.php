<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'country', 'city', 'address', 'phone', 'working_hours',
  ];
}
