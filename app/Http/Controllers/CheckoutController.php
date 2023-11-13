<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\SiteSetting;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use GuzzleHttp\Client;
class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){

        $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);

    } // End Method 

    public function StateGetAjax($district_id){

        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($ship);

    }// End Method 
    public function getUserAddress($latitude, $longitude)
    {
        $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY'; // Replace with your actual API key
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key={$apiKey}";
    
        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
    
        if ($data['status'] === 'OK') {
            $formattedAddress = $data['results'][0]['formatted_address'];
            return $formattedAddress;
        } else {
            return null; // Handle error as needed
        }
    }
    public function CheckoutStore(Request $request){
        $setting = SiteSetting::find(1);
        $categories =Category::orderBy('category_name','ASC')->get();
        $latitude =$request->latitude;
        $longitude =$request->longitude;
        // $userAddress = $this->getUserAddress($latitude, $longitude);
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;   

        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes; 
        $cartTotal = Cart::total();
        Session::put('checkout_data', $data);
        if ($request->payment_option == 'stripe') {
           return view('frontend.payment.stripe',compact('cartTotal','categories','data','setting'));
        }elseif ($request->payment_option == 'card'){
            return view('frontend.payment.cashpay',compact('cartTotal','categories','data','setting'));
        }else{
            return view('frontend.payment.cash',compact('cartTotal','categories','data','setting'));
        }


    }// End Method
}
