<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
class SliderController extends Controller
{
    public function allslider(){
        $allsliders=Slider::latest()->get();
    
        return view('Backend.slider.allslider',compact('allsliders'));
    }
    public function addslider(){

        return view('Backend.slider.addslider');
    }

    public function storeslider(Request $request){
        $validation =$request->validate([
            'slider_title' => 'nullable',
            'short_title' => 'nullable',
            'slider_image' => 'required',
        ]);
        $image =$request->file('slider_image');
        // dd($request);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/slider/'.$name_gen);
        $save_url ='upload/slider/'.$name_gen;
       
        // $slider = new Slider();
        // $slider->slider_name =$validation['slider_name'];
        // $slider->slider_slug =strtolower(str_replace('','-',$request->slider_name));
        // $slider->slider_image =$save_url;
        // $slider->save();
        slider::insert([
           'slider_title' =>$request->slider_title,
           'short_title' =>$request->short_title,
           'slider_image'=> $save_url,
        ]);
      
        return redirect()->route('all.slider')->with('message','slider  added Successfully');
    }

    public function editslider($id){
        $slider =Slider::find($id);
     
       return view('Backend.slider.editslider',compact('slider'));
   }
   public function updateslider(Request $request,$id){
    $validation =$request->validate([
        'slider_title' => 'nullable',
        'short_title' => 'nullable',
    ]);
    $slider=Slider::findOrFail($id);
    $old_image =$slider->slider_image;

    if ($request->file('slider_image')) {

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        if (file_exists($old_image)) {
           unlink($old_image);
        }

        Slider::findOrFail($id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Slider Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } else {

             Slider::findOrFail($id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title, 
        ]);

       $notification = array(
            'message' => 'Slider Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } // end else
}

public function deleteslider($id){
    $slider =Slider::findOrFail($id);
    $sliderimage=$slider->slider_image;
    if (file_exists($sliderimage)) {
        @unlink($sliderimage);
    }
    $slider->delete();
   return redirect()->route('all.slider')->with('message','slider  deleted Successfully');
}
}
