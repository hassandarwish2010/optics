<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'details', 'permalink', 'keywords', 'description',
  ];
}
