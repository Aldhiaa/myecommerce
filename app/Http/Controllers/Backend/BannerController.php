<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
class BannerController extends Controller
{
    public function AllBanner(){
        $allbanners  = Banner::latest()->get();
        return view('Backend.banner.allbanner',compact('allbanners'));
    } 
    public function AddBanner(){
        return view('Backend.banner.banner_add');
}// End Method 

 public function StoreBanner(Request $request){
   // Validation rules
   $rules = [
    'banner_title' => 'required',
    'banner_url' => 'required|url',
    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image rules as needed.
    ];
    
    // Custom validation error messages
    $messages = [
        'banner_title.required' => 'Banner title is required.',
        'banner_url.required' => 'Banner URL is required.',
        'banner_url.url' => 'Banner URL must be a valid URL.',
        'banner_image.required' => 'Banner image is required.',
        'banner_image.image' => 'The uploaded file must be an image.',
        'banner_image.mimes' => 'The image must be in JPEG, PNG, JPG, or GIF format.',
        'banner_image.max' => 'The image size must be less than 2MB.',
    ];
    $request->validate($rules, $messages);

    $image = $request->file('banner_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
    $save_url = 'upload/banner/'.$name_gen;

    Banner::insert([
        'banner_title' => $request->banner_title,
        'banner_url' => $request->banner_url,
        'banner_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Banner Inserted Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('all.banner')->with($notification); 

}
public function EditBanner($id){
    $banner = Banner::findOrFail($id);
    return view('Backend.banner.banner_edit',compact('banner'));
}// End Method 


public function UpdateBanner(Request $request){
   // Validation rules
   $rules = [
    'banner_title' => 'required',
    'banner_url' => 'required|url',
    'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image rules as needed.
    ];
    
    // Custom validation error messages
    $messages = [
        'banner_title.required' => 'Banner title is required.',
        'banner_url.required' => 'Banner URL is required.',
        'banner_url.url' => 'Banner URL must be a valid URL.',
        'banner_image.required' => 'Banner image is required.',
        'banner_image.image' => 'The uploaded file must be an image.',
        'banner_image.mimes' => 'The image must be in JPEG, PNG, JPG, or GIF format.',
        'banner_image.max' => 'The image size must be less than 2MB.',
    ];
    $request->validate($rules, $messages);

    $banner_id = $request->id;
    $old_img = $request->old_image;

    if ($request->file('banner_image')) {

    $image = $request->file('banner_image');
     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
    $save_url = 'upload/banner/'.$name_gen;

    if (file_exists($old_img)) {
       unlink($old_img);
    }

    Banner::findOrFail($banner_id)->update([
        'banner_title' => $request->banner_title,
        'banner_url' => $request->banner_url,
        'banner_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Banner Updated with image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.banner')->with($notification); 

    } else {

        Banner::findOrFail($banner_id)->update([
        'banner_title' => $request->banner_title,
        'banner_url' => $request->banner_url, 
    ]);

   $notification = array(
        'message' => 'Banner Updated without image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.banner')->with($notification); 

    } // end else

}// End Method 




public function DeleteBanner($id){

    $banner = Banner::findOrFail($id);
    $img = $banner->banner_image;
    unlink($img ); 

    Banner::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Banner Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 

}// End Method 


}
