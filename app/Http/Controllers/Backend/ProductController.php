<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\User;
use App\Models\Multiimage;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function allProduct(){
        $allproducts=Product::latest()->get();  
        return view('Backend.product.allproduct',compact('allproducts'));
    }
    public function addProduct(){
        $brands =Brand::latest()->get();
        $categories =Category::latest()->get();
        $subcategories =SubCategory::latest()->get();
        $vendors =User::where('status','active')->where('role','vendor')->latest()->get();
        return view('Backend.product.addproduct',compact('brands','categories','subcategories','vendors'));
    }
    public function storeproduct(Request $request){
        
      $request->validate([
            'product_name' => 'required|string|max:255',
            'product_tags' => 'string|nullable',
            'product_size' => 'string|nullable',
            'product_color' => 'string|nullable',
            'short_describtion' => 'string|nullable',
            'long_describtion' => 'string|nullable',
            'product_thambnail' => 'image|mimes:jpeg,png,jpg,gif', 
            'multi_img.*' => 'image', //
            'city' => 'string|nullable',
            'selling_price' => 'numeric|nullable',
            'discount_price' => 'numeric|nullable',  
            'product_qty' => 'integer|nullable',
            'brand_id' => 'integer|nullable',
            'category_id' => 'integer|nullable',
            'subcategory_id' => 'integer|nullable',
            'vendor_id' => 'integer|nullable',
            'hot_deals' => 'boolean|nullable',
            'featured' => 'boolean|nullable',
            'specail_offer' => 'boolean|nullable',
            'specail_deals' => 'boolean|nullable',
        ]);
    
    
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'city' => $request->city,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => 'PRD-' . Str::random(6),
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_describtion' => $request->short_describtion,
            'long_describtion' => $request->long_describtion, 

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'specail_offer' => $request->specail_offer,
            'specail_deals' => $request->specail_deals, 

            'product_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

         // Multiple Image Upload From her
         $images =$request->file('multi_img');
         foreach ($images as $image) {
            $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/products/multi_img/'.$make_name);
            $upload_path = 'upload/products/multi_img/'.$make_name;

            Multiimage::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);
            //End  Multiple Image Upload 

         }
         $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('all.product')->with($notification);

    }
    public function EditProduct($id){
        $products =Product::findOrFail($id);
        $brands =Brand::latest()->get();
        $multiimages =Multiimage::where('product_id',$id)->get();
        $categories =Category::latest()->get();
        $subcategories =SubCategory::latest()->get();
        $vendors =User::where('status','active')->where('role','vendor')->latest()->get();
        return view('Backend.product.editproduct',compact('brands','categories','subcategories','vendors','products','multiimages'));
    }
    public function updateproduct(Request $request){
        
        $request->validate([
              'product_name' => 'required|string|max:255',
              'product_tags' => 'string|nullable',
              'product_size' => 'string|nullable',
              'product_color' => 'string|nullable',
              'short_describtion' => 'string|nullable',
              'long_describtion' => 'string|nullable',
              'city' => 'string|nullable',

              'selling_price' => 'numeric|nullable',
              'discount_price' => 'numeric|nullable',
       
              'product_qty' => 'integer|nullable',
              'brand_id' => 'integer|nullable',
              'category_id' => 'integer|nullable',
              'subcategory_id' => 'integer|nullable',
              'vendor_id' => 'integer|nullable',
              'hot_deals' => 'boolean|nullable',
              'featured' => 'boolean|nullable',
              'specail_offer' => 'boolean|nullable',
              'specail_deals' => 'boolean|nullable',
          ]);
          
     
          $product_id =$request->id;
          $oldImage = $request->old_image;

          // image thambnail update 
          if ($request->hasFile('product_thambnail')) {
            
            $image = $request->file('product_thambnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/'.$name_gen;
    
             if (file_exists($oldImage)) {
               unlink($oldImage);
            }
    
            Product::findOrFail($product_id)->update([
    
                'product_thambnail' => $save_url,
               
            ]);
          }
          else
          Product::findOrFail($product_id)->update([
    
            'product_thambnail' => $oldImage,
           
         ]);

           Product::findOrFail($product_id)->update([
  
              'brand_id' => $request->brand_id,
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'product_name' => $request->product_name,
              'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
              'city' => $request->city,

            
              'product_qty' => $request->product_qty,
              'product_tags' => $request->product_tags,
              'product_size' => $request->product_size,
              'product_color' => $request->product_color,
  
              'selling_price' => $request->selling_price,
              'discount_price' => $request->discount_price,
              'short_describtion' => $request->short_describtion,
              'long_describtion' => $request->long_describtion, 
  
              'hot_deals' => $request->hot_deals,
              'featured' => $request->featured,
              'specail_offer' => $request->specail_offer,
              'specail_deals' => $request->specail_deals, 
  
            
              'vendor_id' => $request->vendor_id,
              'status' => 1,
              'updated_at' => Carbon::now(), 
  
          ]);    
           $notification = array(
              'message' => 'Product updated  Successfully',
              'alert-type' => 'success'
          );
  
           return redirect()->route('all.product')->with($notification);
  
      }
      public function UpdateProductMultiimage(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = Multiimage::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->save('upload/products/multi_img/'.$make_name);
            $uploadPath = 'upload/products/multi_img/'.$make_name;
    
            Multiimage::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
    
            ]); 
        } // end foreach

         $notification = array(
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method
    
    public function MulitImageDelelte($id){
        $oldImg = Multiimage::findOrFail($id);
        unlink($oldImg->photo_name);

        Multiimage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 
    public function ProductInactive($id){

        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 


      public function ProductActive($id){

        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 

    public function deleteproduct($id){

        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $imges = Multiimage::where('product_id',$id)->get();
        foreach($imges as $img){
            if (file_exists($img->photo_name)) {
                unlink($img->photo_name);
            } 
            
            Multiimage::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 

}
