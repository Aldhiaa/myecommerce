<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
class BrandController extends Controller
{
    public function allbrand(){
        $allbrands=Brand::latest()->get();
    
        return view('Backend.Brand.allbrand',compact('allbrands'));
    }
    public function addbrand(){
        return view('Backend.Brand.addbrand');
    }
    public function storebrand(Request $request){
        $validation =$request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);
        $image =$request->file('brand_image');
        // dd($request);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url ='upload/brand/'.$name_gen;
       
        $brand = new Brand();
        $brand->brand_name =$validation['brand_name'];
        $brand->brand_slug =strtolower(str_replace('','-',$request->brand_name));
        $brand->brand_image =$save_url;

        // Brand::insert([
        //    'brand_name' =>$request->brand_name,
        //    'brand_slug' =>strtolower(str_replace('','-',$request->brand_name)),
        //    'brand_image'=> $save_url,
        // ]);
      $brand->save();
        return redirect()->route('all.brand')->with('message','brand  added Successfully');
    }
    public function editbrand($id){
         $brand =Brand::find($id);
      
        return view('Backend.Brand.editbrand',compact('brand'));
    }
    
    public function updatebrand(Request $request,$id){
        $validation =$request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);
        $image =$request->file('brand_image');
        // dd($request);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url ='upload/brand/'.$name_gen;
       
        $brand= Brand::find($id);
        $brand->brand_name =$validation['brand_name'];
        $brand->brand_slug =strtolower(str_replace('','-',$request->brand_name));
        $brand->brand_image =$save_url;

        // Brand::insert([
        //    'brand_name' =>$request->brand_name,
        //    'brand_slug' =>strtolower(str_replace('','-',$request->brand_name)),
        //    'brand_image'=> $save_url,
        // ]);
      $brand->save();
        return redirect()->route('all.brand')->with('message','brand  updated Successfully');
    }
    public function deletebrand($id){
        $brand =Brand::findOrFail($id);
        $brandimage=$brand->brand_image;
        @unlink($brandimage);
        $brand->delete();
       return redirect()->route('all.brand')->with('message','brand  deleted Successfully');
   }
}
