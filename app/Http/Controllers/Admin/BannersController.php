<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Http\Requests\Admin\BannerRequest;

class BannersController extends Controller
{
  /**
   * Show all banners
   *
   * @return response
   */
  public function index(Banner $banner) {
     $banners = $banner->orderBy('id', 'asc')->get();

     foreach ($banners as $banner) {
       $banner->description = clean_limit($banner->description);
       if ($banner->position_id == 5) {
         $banner->file = asset('public/uploads/' . $banner->file);
       } else {
         $banner->file = asset('public/uploads/thumbs/' . $banner->file);
       }

       switch($banner->position_id) {
         case 1 :
          $banner->position_name = 'Men';
          break;
         case 2 :
          $banner->position_name = 'Women';
          break;
         case 3 :
          $banner->position_name = 'Best sellers';
          break;
         case 4 :
          $banner->position_name = 'Execlusive';
          break;
         case 5 :
          $banner->position_name = 'Video';
          break;
         case 6 :
          $banner->position_name = 'Designer collection';
          break;
          case 7 :
          $banner->position_name = 'Slider';
          break;
       }
       
     }

     return view('admin.banners.index', compact('banners'));
  }

  /**
   * Create new banner
   *
   * @return response
   */
  public function create() {
      return view('admin.banners.create');
  }

  /**
   * Store new bannerPBP
   *
   * @return response
   */
  public function store(BannerRequest $request, Banner $banner) {
    if ($request->position_id == 5) {
      request()->validate([
       'file' => 'required|mimes:m4v,avi,flv,mp4,mov|max:20000',
      ]);
    } else {
      request()->validate([
       'file' => 'required|image|max:7000',
      ]);
    }

    if ($request->position_id == 5) {
      $request->file = uploadVideo($request->file);
    } else {
      $request->file = uploadImage($request->file);
    }

    $banner = Banner::create($request->all());
    $banner->file = $request->file;
    $banner->save();

    return redirect()->back()->with(['success' => 'Banner inserted succesfully']);
  }

  /**
   * Edit existing banner
   *
   * @return response
   */
  public function edit($id, Banner $banners) {
    $banner = $banners->find($id);

    if (! $banner) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }

    if($banner->position_id == 5) {
      $banner->file = asset('public/uploads/' . $banner->file);
    } else {
      $banner->file = asset('public/uploads/thumbs/' . $banner->file);
    }

    return view('admin.banners.edit', compact('banner'));
  }

  /**
   * Update existing banner
   *
   * @return response
   */
  public function update($id, BannerRequest $request) {
     $banner = Banner::find($id);

     if (! $banner) {
       return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
     }

     if ($request->position_id != $banner->position_id) {
       if ($request->position_id == 5) {
         request()->validate([
          'file' => 'required|mimes:m4v,avi,flv,mp4,mov|max:20000',
         ]);
       } else {
         request()->validate([
          'file' => 'required|image|max:7000',
         ]);
       }
     }

     if($request->hasFile('file')) {
       if ($request->position_id == 5) {
         request()->validate([
          'file' => 'required|mimes:m4v,avi,flv,mp4,mov|max:20000',
         ]);
       } else {
         request()->validate([
          'file' => 'required|image|max:7000',
         ]);
       }
     }

     $banner->fill($request->except('file'));
      if($request->hasFile('file')) {
        if ($request->position_id == 5) {
          $banner->file = uploadVideo($request->file);
        } else {
          $banner->image = uploadImage($request->file);
        }
      }
      $banner->save();

     return redirect()->back()->with(['success' => 'Banner updated successfully']);
  }

  /**
   * Delete banner by the given id
   *
   * @return message
   */
  public function destroy($id) {
      $banner = Banner::find($id);

      if (! $banner) {
        return redirect()->back()->with(['error' => 'Data Not Found']);
      }
      Banner::destroy($id);
      return redirect()->back()->with(['success' => 'Banner deleted successfully']);
  }
}
