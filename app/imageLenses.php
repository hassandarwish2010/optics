<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imageLenses extends Model
{
  /**
   * Table name
   *
   * @return string
   */
  protected $table = 'contact_lenses_images';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'image', 'contact_lenses_id',
  ];
}
