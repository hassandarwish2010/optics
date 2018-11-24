<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contact_lenses;
use App\Brand;
use App\Http\Requests\Admin\lensesRequest;

class LensesController extends Controller
{
  /**
   * Show all lensess
   *
   * @return response
   */
  public function index(contact_lenses $lenses) {
     $lenses = $lenses->orderBy('id', 'asc')->get();
      //dd($lenses);


    
     return view('admin.lensess.index', compact('lenses'));
  }

  /**
   * Create new lenses
   *
   * @return response
   */
  public function create() {
    $brands = Brand::all();

    return view('admin.lensess.create', compact('brands'));
  }

  /**
   * Store new lenses
   *
   * @return response
   */
//   public function store(Request $request)
 
// {
 
// $this->validate($request, [
 
// 'color' => 'required',
// 'brand_id' => 'required',
// 'photos'=>'required',
 
// ]);
 
// if($request->hasFile('photos'))
 
// {
 
// $allowedfileExtension=['jpeg','jpg','png','jpg'];
 
// $files = $request->file('photos');
 
// foreach($files as $file){
 
// $filename = $file->getClientOriginalName();
 
// $extension = $file->getClientOriginalExtension();
 
// $check=in_array($extension,$allowedfileExtension);
 
// //dd($check);
 
// if($check)
 
// {
 
// $items= contact_lenses::create($request->all());
 
// foreach ($request->photos as $photo) {
 
// $filename = $photo->store('photos');
 
// contact_lenses::create([
 
// 'color' => $items->color,
// 'brand_id' => $items->brand_id,
 
// 'image' => $filename
 
// ]);
 
// }
 

 
// }}}return redirect()->back()->with(['success' => 'lenses inserted successfully']);
// }
  public function store(lensesRequest $request) {
    request()->validate([
     'image' => 'required|image|max:5000',
     
    ]);

    $request->image = uploadImage($request->image);

    $lenses = contact_lenses::create($request->all());
    $lenses->image = $request->image;
    $lenses->save();

    return redirect()->back()->with(['success' => 'lenses inserted successfully']);
  }

  /**
   * edit existing lenses
   *
   * @return response
   */
  public function edit($id) {
    $brands = Brand::all();
    $lenses = contact_lenses::where('id', $id)->first();
    if (! $lenses) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    $lenses->image = asset('public/uploads/thumbs/' . $lenses->image);

    return view('admin.lensess.edit', compact('lenses', 'brands'));
  }

  /**
   * update existing lenses
   *
   * @return response
   */
  public function update($id, lensesRequest $request) {
    $lenses = contact_lenses::where(['id' => $id])->first();

    if (! $lenses) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

   
    $lenses = $lenses->fill($request->except('image'));
     if($request->hasFile('image')) {
         $lenses->image = uploadImage($request->image, 1024, 650);
     }
    $lenses->save();

   return redirect()->back()->with(['success' => 'lenses updated successfully']);
  }

  /**
   * Delete lenses by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $lenses = contact_lenses::where(['id' => $id])->first();

    if (! $lenses) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    contact_lenses::destroy($id);
    return redirect()->back()->with(['success' => 'lenses deleted successfully']);
  }
}
