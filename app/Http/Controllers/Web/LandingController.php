<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Product;
use App\Setting;
use App\Banner;

class LandingController extends Controller
{
    /**
     * Show landing page
     *
     * @return response
     */
    public function index() {
      $collections = Brand::all();
      foreach ($collections as $collection) {
        $collection->logo = asset('public/uploads/thumbs/' . $collection->logo);
      }

      $twoBrandsRandom = Brand::inRandomOrder()->limit(2)->get();
      foreach ($twoBrandsRandom as $brand) {
        $brand->logo = asset('public/uploads/thumbs/' . $brand->logo);
      }

      $just_arrived_products = Product::orderBy('id', 'desc')->with('brand')->limit(10)->get();
      foreach ($just_arrived_products as $product) {
        $product->full_image = asset('public/uploads/' . $product->image);
        $product->image = asset('public/uploads/thumbs/' . $product->image);
      }
      $banners=Banner::where('position_id',7)->get();
       $vidios=Banner::where('position_id',5)->get();
   //dd($vidios);
      $setting = Setting::first();

      return view('web.landing.index', compact('collections', 'twoBrandsRandom', 'just_arrived_products', 'setting','banners','vidios'));
    }
}
