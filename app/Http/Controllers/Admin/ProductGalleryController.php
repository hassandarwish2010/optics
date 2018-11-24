<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImages;

class ProductGalleryController extends Controller
{
  /**
   * Show service videos
   *
   * @return response
   */
   public function show($product_id, Product $products) {
     $product = $products->where(['id' => $product_id])->first();
     if (! $product) {
       return redirect()->back()->with(['error' => 'Data not found']);
     }

     $images = ProductImages::where(['product_id' => $product_id])->get();

     foreach ($images as $image) {
       $image->image = asset('public/uploads/thumbs/' . $image->image);
     }

     return view('admin.product-gallery.show', compact('images', 'product_id'));
   }

   /**
    * Create image for product
    *
    * @return respone
    */
   public function create($product_id, Product $products) {
     $product = $products->where(['id' => $product_id])->first();
     if (! $product) {
       return redirect()->back()->with(['error' => 'Data not found']);
     }

     return view('admin.product-gallery.create', compact('product_id'));
   }

   /**
    * Store image for product
    *
    * @return respone
    */
   public function store(Request $request, $product_id, Product $products, ProductImages $productImages) {
     $product = $products->where(['id' => $product_id])->first();
     if (! $product) {
       return redirect()->back()->with(['error' => 'Data not found']);
     }

     $request->validate([
      'image' => 'required|image|max:5000',
     ]);

     $request->image = uploadImage($request->image);
     ProductImages::insert([
       'product_id' => $product_id,
       'image' => $request->image,
     ]);

     return redirect()->back()->with(['success' => 'Image inserted successfully']);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $image_id
    * @return \Illuminate\Http\Response
    */
   public function destroy($image_id)
   {
     $image = ProductImages::where('id', $image_id)->first();
     if (! $image) {
       return redirect()->back()->with(['error' => 'Data not found']);
     }

     ProductImages::destroy($image_id);
     return redirect()->back()->with(['success' => 'Image deleted successfully']);
   }
}
