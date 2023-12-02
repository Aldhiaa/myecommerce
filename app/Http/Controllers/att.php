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

class att extends Controller
{
    public function a(){
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
        return view('frontend.body.header1',compact('categories','sliders','products','featuredproducts','vendors','banners','setting','seo','hot_dealsproducts','specail_offerproducts','specail_dealsproducts'));
    }

}
