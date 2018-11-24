<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Requests\Admin\BrandRequest;

class BrandsController extends Controller
{
  /**
   * Show all brands
   *
   * @return response
   */
  public function index(Brand $brand) {
     $brands = $brand->orderBy('id', 'asc')->get();
     foreach ($brands as $brand) {
       $brand->logo = asset('public/uploads/thumbs/' . $brand->logo);
     }
     return view('admin.brands.index', compact('brands'));
  }

  /**
   * Create new brand
   *
   * @return response
   */
  public function create() {
    return view('admin.brands.create');
  }

  /**
   * Store new brand
   *
   * @return response
   */
  public function store(BrandRequest $request) {
    request()->validate([
      'logo' => 'required|image|max:5000',
    ]);

    $request->logo = uploadImage($request->logo);

    $brand = Brand::create($request->all());
    $brand->logo =  $request->logo;
    $brand->save();

    return redirect()->back()->with(['success' => 'Brand inserted successfully']);
  }

  /**
   * edit existing brand
   *
   * @return response
   */
  public function edit($id) {
    $brand = Brand::find($id);

    if (! $brand) {
      return redirect()->back()->with(['error' => 'Brand Not Found']);
    }

    $brand->logo = asset('public/uploads/thumbs/' . $brand->logo);

    return view('admin.brands.edit', compact('brand'));
  }

  /**
   * update existing brand
   *
   * @return response
   */
  public function update($id, BrandRequest $request) {
    $brand = Brand::find($id);

    if (! $brand) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    if($request->hasFile('logo')) {
      request()->validate([
        'logo' => 'required|image|max:5000',
      ]);
    }

    $brand = $brand->fill($request->except('logo'));
    if($request->hasFile('logo')) {
        $brand->logo = uploadImage($request->logo);
    }
    $brand->save();

   return redirect()->back()->with(['success' => 'Brand updated successfully']);
  }

  /**
   * Delete brand by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $brand = Brand::find($id);

    if (! $brand) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Brand::destroy($id);
    return redirect()->back()->with(['success' => 'Brand deleted successfully']);
  }
}
