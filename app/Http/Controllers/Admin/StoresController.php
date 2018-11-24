<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use App\Http\Requests\Admin\StoreRequest;

class StoresController extends Controller
{
  /**
   * Show all stores
   *
   * @return response
   */
  public function index(Store $store) {
     $stores = $store->orderBy('id', 'asc')->get();

     return view('admin.stores.index', compact('stores'));
  }

  /**
   * Create new store
   *
   * @return response
   */
  public function create() {
    return view('admin.stores.create');
  }

  /**
   * Store new store
   *
   * @return response
   */
  public function store(StoreRequest $request) {
    $store = Store::create($request->all());
    $store->save();

    return redirect()->back()->with(['success' => 'Store inserted successfully']);
  }

  /**
   * edit existing store
   *
   * @return response
   */
  public function edit($id) {
    $store = Store::find($id);

    return $store ? view('admin.stores.edit', compact('store')) : redirect()->back()->with(['error' => 'Data Not Found']);
  }

  /**
   * update existing store
   *
   * @return response
   */
  public function update($id, StoreRequest $request) {
    $store = Store::find($id);

    if (! $store) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    $store = $store->fill($request->all());
    $store->save();

   return redirect()->back()->with(['success' => 'Store updated successfully']);
  }

  /**
   * Delete store by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $store = Store::find($id);

    if (! $store) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Store::destroy($id);
    return redirect()->back()->with(['success' => 'Store deleted successfully']);
  }
}
