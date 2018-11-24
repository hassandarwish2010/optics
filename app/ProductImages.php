<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
  /**
   * Table name
   *
   * @return string
   */
  protected $table = 'product_images';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'image', 'product_id','contact_lenses_id'
  ];
}
