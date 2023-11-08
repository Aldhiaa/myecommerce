<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\seo;
use Image;
class SiteSettingController extends Controller
{
    public function SiteSetting(){

        $setting = SiteSetting::find(1);
        if (!$setting) {
            // If no record exists, create a new one
            $setting = new SiteSetting();
        }
        return view('backend.setting.setting_update',compact('setting'));

    } // End Method 


public function SiteSettingUpdate(Request $request){

        $setting_id = $request->id; 
        $sitesetting = SiteSetting::find($setting_id);
        if ($sitesetting) {
            $oldlogo =$sitesetting->logo;
            if (file_exists($oldlogo)) {
                unlink($oldlogo);
             }  
        }     
        if ($request->file('logo')) {
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(180,56)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;
         $data = [
            'title' => $request->ecommerce_name,
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright, 
            'logo' => $save_url, 
        ];
        if ($setting_id) {
            SiteSetting::findOrFail($setting_id)->update([
                $data
            ]); 
        }else {           
            SiteSetting::create($data);
        }
       

       $notification = array(
            'message' => 'Site Setting Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } else {
            $data = [
                'ecommerce_name' => $request->ecommerce_name,
                'support_phone' => $request->support_phone,
                'phone_one' => $request->phone_one,
                'email' => $request->email,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'copyright' => $request->copyright,                
            ];
            if ($setting_id) {
                SiteSetting::findOrFail($setting_id)->update([
                    $data
                ]); 
            }else {           
                SiteSetting::create($data);
            }
            

       $notification = array(
            'message' => 'Site Setting Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } // end else

    }// End Method 

    public function SeoSetting(){

        $seo = seo::find(1);
        if (!$seo) {
            // If no record exists, create a new one
            $seo = new Seo();
        }
        return view('backend.seo.seo_update',compact('seo'));

    } // End Method 


    public function SeoSettingUpdate(Request $request){
        $seo_id = $request->id;
        $data = [
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ];
        if ($seo_id) {
            Seo::findOrFail($seo_id)->update([
                $data
            ]); 
        }else {           
            Seo::create($data);
        }
   

       $notification = array(
            'message' => 'Seo Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }// End Method 
}
