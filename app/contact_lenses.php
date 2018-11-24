<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_lenses extends Model
{
	 //protected $table = 'contact_lenses';
      protected $fillable = [
       'image', 'brand_name','color'
  ];

  /**
   * Brand data
   *
   * @return response
   */
 

  /**
   * images data
   *
   * @return response
   */
  public function images() {
      return $this->hasMany('App\imageLenses', 'contact_lenses_id', 'id');
  }
}
