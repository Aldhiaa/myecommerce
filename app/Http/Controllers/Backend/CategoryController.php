<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
class CategoryController extends Controller
{
    public function allcategory(){
        $allcategories=Category::latest()->get();
    
        return view('Backend.category.allcategory',compact('allcategories'));
    }
    public function addcategory(){
        return view('Backend.category.addcategory');
    }
    public function storecategory(Request $request){
        $validation =$request->validate([
            'category_name' => 'required',
            'category_image' => 'required',
        ]);
        $image =$request->file('category_image');
        // dd($request);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(150,150)->save('upload/category/'.$name_gen);
        $save_url ='upload/category/'.$name_gen;
       
        $category = new Category();
        $category->category_name =$validation['category_name'];
        $category->category_slug =strtolower(str_replace('','-',$request->category_name));
        $category->category_image =$save_url;

        // category::insert([
        //    'category_name' =>$request->category_name,
        //    'category_slug' =>strtolower(str_replace('','-',$request->category_name)),
        //    'category_image'=> $save_url,
        // ]);
      $category->save();
        return redirect()->route('all.category')->with('message','category  added Successfully');
    }
    public function editcategory($id){
         $category =Category::find($id);
      
        return view('Backend.category.editcategory',compact('category'));
    }
    
    public function updatecategory(Request $request,$id){
        $validation =$request->validate([
            'category_name' => 'required',
            'category_image' => 'required',
        ]);
        $image =$request->file('category_image');
        // dd($request);
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(150,150)->save('upload/category/'.$name_gen);
        $save_url ='upload/category/'.$name_gen;
        
        $category= Category::find($id);
        @unlink($category->category_image);
        $category->category_name =$validation['category_name'];
        $category->category_slug =strtolower(str_replace('','-',$request->category_name));
        $category->category_image =$save_url;

        // category::insert([
        //    'category_name' =>$request->category_name,
        //    'category_slug' =>strtolower(str_replace('','-',$request->category_name)),
        //    'category_image'=> $save_url,
        // ]);
      $category->save();
        return redirect()->route('all.category')->with('message','category  updated Successfully');
    }
    public function deletecategory($id){
        $category =Category::findOrFail($id);
        $categoryimage=$category->category_image;
        @unlink($categoryimage);
        $category->delete();
       return redirect()->route('all.category')->with('message','category  deleted Successfully');
   }
}
