<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    
    public function Allcoupon(){
        $coupons=Coupon::latest()->get();
    
        return view('Backend.coupons.allcoupons',compact('coupons'));
    }
    public function addcoupon(){
        return view('Backend.coupons.addcoupon');
    }
    public function storeCoupon(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'coupon_name' => 'required|string|max:255',
            'coupon_discount' => 'required|numeric|between:0,100',
            'coupon_validity' => 'required|date|after_or_equal:today',
        ]);
    
        // If validation passes, insert the data into the database
        Coupon::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
    
        return redirect()->route('all.coupon')->with('message', 'Coupon added successfully');
    }
    public function EditCoupon($id){

        $coupon = Coupon::findOrFail($id);
        return view('Backend.coupons.edit_coupon',compact('coupon'));

    }// End Method 


    public function updateCoupon(Request $request)
{
    $coupon_id = $request->id;

    // Validate the incoming request data
    $request->validate([
        'coupon_name' => 'required|string|max:255',
        'coupon_discount' => 'required|numeric',
        'coupon_validity' => 'required|date',
    ]);

    // If validation passes, update the data in the database
    Coupon::findOrFail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        'created_at' => now(),
    ]);

    $notification = array(
        'message' => 'Coupon Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.coupon')->with($notification);
}
// End Method 

     public function DeleteCoupon($id){

        Coupon::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 
    
    
}
