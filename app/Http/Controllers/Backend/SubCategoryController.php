<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    public function allsubcategory(){
        $allsubcategories =SubCategory::latest()->get();

        return view('Backend.subcategory.allsubcategory',compact('allsubcategories'));
    }    
    public function addsubcategory(){

        $categories =Category::orderby('category_name','ASc')->get();

        return view('Backend.subcategory.addsubcategory',compact('categories'));
    }
    public function storesubcategory (Request $request){
       $validate=$request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required',
       ]);
       SubCategory::insert([
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
        'category_id' => $request->category_id,
       ]);

       return redirect()->route('all.category')->with('message','category  added Successfully');
    }
    public function editsubcategory($id){
        $subcategory =SubCategory::find($id);
        $categories =Category::orderby('category_name','ASc')->get();

        return view('Backend.subcategory.editsubcategory',compact('subcategory','categories'));
    }
    public function updatesubcategory(Request $request,$id){
        $validation =$request->validate([
            'category_id' => 'required',
            'category_name' => 'required',
        ]);

        
        $Subcategory= SubCategory::find($id);

        $Subcategory::update([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category_id,
           ]);
        return redirect()->route('all.category')->with('message','subcategory  updated Successfully');
    }
    public function deletesubcategory($id){
        $subcategory =SubCategory::findOrFail($id);
        $subcategory->delete();
       return redirect()->route('all.subcategory')->with('message','subcategory  deleted Successfully');
   }
   public function getSubcategories($categoryId)
{
    $subcategories = Subcategory::where('category_id', $categoryId)->orderby('subcategory_name','ASC')->get();
    return json_encode($subcategories);
}
    
}
