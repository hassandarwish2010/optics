<?php

/**
 * Upload image
 *
 * @return name
 */
use Illuminate\Http\Request;

function uploadImage($upload, $resize_width = 500, $resize_height = 500){
        $filename = rand().time().'.'.$upload->getClientOriginalExtension();
        $filePath = public_path('uploads/').$filename;
        $thumbPath = public_path('uploads/thumbs/').$filename;
        $image = Image::make($upload);
        $thumb = Image::make($upload)->resize($resize_width, $resize_height)->encode($upload->getClientOriginalExtension(), 75);
        $image->save($filePath);
        $thumb->save($thumbPath);
        return $filename;
}

// function uploadImageArr($files, $resize_width = 500, $resize_height = 500){

//             foreach($files as $file){    
//         $filename =$file->rand().time().'.'.$upload->getClientOriginalExtension();
//         $filePath = $file->public_path('uploads/').$filename;
//         $thumbPath = $file->public_path('uploads/thumbs/').$filename;
//         $image =$file-> Image::make($upload);
//         $thumb = $file->mage::make($upload)->resize($resize_width, $resize_height)->encode($upload->getClientOriginalExtension(), 75);
//         $image->save($filePath);
//         $thumb->save($thumbPath);
//         return $filename;
// }
// }
//     public function uploadaa(){
//                $this->validate(request(),['file.*'=>'required|image|mimes:jpeg,jpg,png']);
//                $files=request()->file('file');
               
//                foreach($files as $file){

//                     $name=$file->getClientOriginalName();
//                     $ex=$file->getClientOriginalExtension();
//                     $size=$file->getSize();
//                     $mim=$file->getMimeType();
//                     $real=$file->getRealPath();
//                     $file->move(public_path('uploads'),'image_'.time().".".$ex);
//                }
//               return back();
//         }


//Upload video
function uploadVideo($upload){
  $filename = rand().time().'.'.$upload->getClientOriginalExtension();
  $filePath = public_path('uploads');
  $upload->move($filePath, $filename);
  return $filename;
}

/**
 * Limit with clean string
 *
 * @return string
 */
function clean_limit($string, $limit = 20) {
  return $string = str_limit(html_entity_decode(strip_tags($string)), $limit);
}

/**
 * Get banner depending it's position
 *
 * @return response
 */
 function banner($position_id) {
   $banner = \App\Banner::where('position_id', $position_id)->first();
   if($banner != null) {
     if($banner->position_id == 5){
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
        case 7 :
        $banner->position_name = 'Slider';
        break;
     }

     $banner->description = clean_limit($banner->description);

   }

   return $banner;
 }
