<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contact_lenses;

class contactLensesController extends Controller
{
    /**
     * Products page
     *
     * @return response
     */
    public function index(Request $request) {
      $lense = contact_lenses::with('images')->get();
      foreach ($lense as $lensess) {
        $lensess->full_image = asset('public/uploads/' . $lensess->image);
        $lensess->image = asset('public/uploads/thumbs/' . $lensess->image);
        foreach ($lensess->images as $image) {
          $image->full_image = asset('public/uploads/' . $image->image);
          $image->image = asset('public/uploads/thumbs/' . $image->image);
        }
      }
     //dd($lense);

      return view('web.contactLensesController.index', compact('lense','lensess'));
    }
}
