<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Multiimage;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use App\Models\SiteSetting;
use App\Models\seo;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Index(){
        $categories =Category::orderBy('category_name','ASC')->get();
        $sliders=Slider::orderBy('slider_title','ASC')->get();
        $products=Product::where('status',1)->orderBy('id','ASC')->limit(9)->get();
        $featuredproducts=Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(10)->get();
        $hot_dealsproducts=Product::where('status',1)->where('hot_deals',1)->orderBy('id','DESC')->limit(10)->get();
        $specail_offerproducts=Product::where('status',1)->where('specail_offer',1)->orderBy('id','DESC')->limit(10)->get();
        $specail_dealsproducts=Product::where('status',1)->where('specail_deals',1)->orderBy('id','DESC')->limit(10)->get();
        $vendors=User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->limit(6)->get();
        $banners = Banner::orderBy('banner_title','ASC')->limit(3)->get();
        $setting = SiteSetting::find(1);
        $seo = seo::find(1);
        return view('frontend.index',compact('categories','sliders','products','featuredproducts','vendors','banners','setting','seo','hot_dealsproducts','specail_offerproducts','specail_dealsproducts'));
    }
    public function productdetails($id,$slug){
        $setting = SiteSetting::find(1);
        $categories =Category::orderBy('category_name','ASC')->get();
        $product=Product::findOrFail($id);
       
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $multimage=Multiimage::where('product_id',$id)->get();
        $cat_id =$product->category_id;
        $relatedproduct=Product::where('category_id',$cat_id)->where('id', '!=', $id)->orderBy('id','DESC')->limit(4)->get();
        $size = $product->product_size;
        $product_size = explode(',', $size);
        
        return view('frontend.product.details',compact('product','categories','product_color','product_size','multimage','relatedproduct','setting'));
    }
    public function FrontVendordetails($id){
        $setting = SiteSetting::find(1);
        $vendor=User::findOrFail($id);
        $VendProduct=Product::where('vendor_id',$id)->get();
        $categories =Category::orderBy('category_name','ASC')->get();

        return view('frontend.vendor.details',compact('VendProduct','categories','vendor','setting'));
    }
    public function VendorAll(){
        $setting = SiteSetting::find(1);
        $vendors=User::where('status','active')->where('role','vendor')->orderBy('id','DESC')->limit(6)->get();
        $categories =Category::orderBy('category_name','ASC')->get();
        return view('frontend.vendor.vendor_all',compact('vendors','categories','setting'));
    }
    public function CatWiseProduct(Request $request,$id,$slug){
        $setting = SiteSetting::find(1);
        $products = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(8);
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadcat = Category::where('id',$id)->first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.product.category_view',compact('products','categories','breadcat','newProduct','setting'));
  
       }// End Method 
    public function SubCatWiseProduct(Request $request,$id,$slug){
        $setting = SiteSetting::find(1);
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(8);
        $subcategories = SubCategory::orderBy('subcategory_name','ASC')->get();
        $categories = Category::orderBy('category_name','ASC')->get();
        $breadsubcat = SubCategory::where('id',$id)->first();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.product.subcategory_view',compact('products','categories','subcategories','breadsubcat','newProduct','setting'));
  
       }// End Method 
    public function ProductViewAjax($id){
 
        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(

         'product' => $product,
         'color' => $product_color,
         'size' => $product_size,

        ));
       }// End Method
       
       public function ProductSearch(Request $request){

        $request->validate(['search' => "required"]);

        $item = $request->search;
        $setting = SiteSetting::find(1);
        $categories = Category::orderBy('category_name','ASC')->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        $newProduct = Product::orderBy('id','DESC')->limit(3)->get();
        return view('frontend.product.search',compact('products','item','categories','newProduct','setting'));

    }// End Method 2

    public function SearchProduct(Request $request){

        $request->validate(['search' => "required"]);
 
         $item = $request->search;
         $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_slug','product_thambnail','selling_price','id')->limit(6)->get();
 
         return view('frontend.product.search_product',compact('products'));
 
      }// End Method 
}
