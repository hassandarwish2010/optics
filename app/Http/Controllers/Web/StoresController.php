<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;

class StoresController extends Controller
{
    /**
     * Stores page
     *
     * @return response
     */
    public function index() {
      $stores = Store::all();

      return view('web.stores.index', compact('stores'));
    }
}
