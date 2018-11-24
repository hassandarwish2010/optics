<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Products page
     *
     * @return response
     */
    public function index(Request $request) {
      $products = Product::where('gender', $request->gender)->with('brand', 'images')->where('type', $request->type)->get();
      foreach ($products as $product) {
        $product->full_image = asset('public/uploads/' . $product->image);
        $product->image = asset('public/uploads/thumbs/' . $product->image);
        foreach ($product->images as $image) {
          $image->full_image = asset('public/uploads/' . $image->image);
          $image->image = asset('public/uploads/thumbs/' . $image->image);
        }
      }

      return view('web.products.index', compact('products'));
    }
}
