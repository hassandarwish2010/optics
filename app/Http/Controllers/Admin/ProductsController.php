<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Http\Requests\Admin\ProductRequest;

class ProductsController extends Controller
{
  /**
   * Show all products
   *
   * @return response
   */
  public function index(Product $product) {
     $products = $product->with('brand')->orderBy('id', 'asc')->get();
     foreach ($products as $product) {
       $product->details = clean_limit($product->details);
       $product->image = asset('public/uploads/thumbs/' . $product->image);
       switch($product->type) {
         case 1 :
          $product->type_name = 'Sunglasses';
          break;
         case 2 :
          $product->type_name = 'Optical';
          break;
       }
       switch($product->gender) {
         case 1 :
          $product->gender_name = 'Men';
          break;
         case 2 :
          $product->gender_name = 'Women';
          break;
        case 3 :
         $product->gender_name = 'Kids';
         break;
       }
     }
     return view('admin.products.index', compact('products'));
  }

  /**
   * Create new product
   *
   * @return response
   */
  public function create() {
    $brands = Brand::all();

    return view('admin.products.create', compact('brands'));
  }

  /**
   * Store new product
   *
   * @return response
   */
  public function store(ProductRequest $request) {
    request()->validate([
     'image' => 'required|image|max:5000',
     'permalink' => 'required|string|unique:products',
    ]);

    $request->image = uploadImage($request->image);

    $product = Product::create($request->all());
    $product->image = $request->image;
    $product->save();

    return redirect()->back()->with(['success' => 'Product inserted successfully']);
  }

  /**
   * edit existing product
   *
   * @return response
   */
  public function edit($id) {
    $brands = Brand::all();
    $product = Product::where('id', $id)->first();
    if (! $product) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    $product->image = asset('public/uploads/thumbs/' . $product->image);

    return view('admin.products.edit', compact('product', 'brands'));
  }

  /**
   * update existing product
   *
   * @return response
   */
  public function update($id, ProductRequest $request) {
    $product = Product::where(['id' => $id])->first();

    if (! $product) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    request()->validate([
      'permalink' => 'required|string|unique:products,permalink,'.$id,
    ]);

    $product = $product->fill($request->except('image'));
     if($request->hasFile('image')) {
         $product->image = uploadImage($request->image, 1024, 650);
     }
    $product->save();

   return redirect()->back()->with(['success' => 'product updated successfully']);
  }

  /**
   * Delete product by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $product = Product::where(['id' => $id])->first();

    if (! $product) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Product::destroy($id);
    return redirect()->back()->with(['success' => 'Product deleted successfully']);
  }
}
