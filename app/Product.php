<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'code', 'details', 'image', 'brand_id', 'type', 'gender' , 'permalink', 'keywords', 'description',
  ];

  /**
   * Brand data
   *
   * @return response
   */
  public function brand() {
      return $this->hasOne('App\Brand', 'id', 'brand_id');
  }

  /**
   * images data
   *
   * @return response
   */
  public function images() {
      return $this->hasMany('App\ProductImages', 'product_id', 'id');
  }
}
