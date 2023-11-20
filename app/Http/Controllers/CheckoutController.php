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
    // public function getUserAddress($latitude, $longitude)
    // {
    //     $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY'; // Replace with your actual API key
    //     $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key={$apiKey}";
    
    //     $client = new Client();
    //     $response = $client->get($url);
    //     $data = json_decode($response->getBody(), true);
    
    //     if ($data['status'] === 'OK') {
    //         $formattedAddress = $data['results'][0]['formatted_address'];
    //         return $formattedAddress;
    //     } else {
    //         return null; // Handle error as needed
    //     }
    // }
    public function getUserAddress($latitude, $longitude)
    {
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$latitude}&lon={$longitude}&zoom=18&addressdetails=1";
    
        $client = new Client();
    
        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
    
            if (isset($data['display_name'])) {
                $formattedAddress = $data['display_name'];
                return $formattedAddress;
            } else {
                return null; // Handle error as needed
            }
        } catch (\Exception $e) {
            // Handle Guzzle HTTP request exception
            return null;
        }
    }
        
    public function CheckoutStore(Request $request){
       
        $setting = SiteSetting::find(1);
        $categories =Category::orderBy('category_name','ASC')->get();
        $latitude =$request->latitude;
        $longitude =$request->longitude;
        $userAddress = $this->getUserAddress($latitude, $longitude);
        $data = array();
        $rules = [
            'shipping_name' => 'required|string',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|numeric',
            'post_code' => 'required|string',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'state_id' => 'required|exists:states,id',
            'shipping_address' => 'required',
            'notes' => 'nullable|string',
            'payment_option' => 'required|in:stripe,other_payment_options',
        ];
        
        // Custom validation error messages
        $messages = [
            'shipping_name.required' => 'The shipping name is required.',
            'shipping_name.string' => 'The shipping name must be a string.',
        
            'shipping_email.required' => 'The shipping email is required.',
            'shipping_email.email' => 'The shipping email must be a valid email address.',
        
            'shipping_phone.required' => 'The shipping phone number is required.',
            'shipping_phone.numeric' => 'The shipping phone number must be a numeric value.',
        
            'post_code.required' => 'The post code is required.',
            'post_code.string' => 'The post code must be a string.',
        
            'division_id.required' => 'The division is required.',
            'division_id.exists' => 'The selected division is invalid.',
        
            'district_id.required' => 'The district is required.',
            'district_id.exists' => 'The selected district is invalid.',
        
            'state_id.required' => 'The state is required.',
            'state_id.exists' => 'The selected state is invalid.',

            'shipping_address.required' => 'The state is required.',
            
        
            'notes.string' => 'The notes must be a string.',
        
            'payment_option.required' => 'The payment option is required.',
            'payment_option.in' => 'The selected payment option is invalid.',
        
            'distric_name.required' => 'District title is required.',
        ];
        
        // Validate the request data
        $request->validate($rules, $messages);
        
        // Prepare the data for storing or further processing
        $data = [
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'post_code' => $request->post_code,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'shipping_address' => $request->shipping_address, 
            'location_address' => $userAddress, 
            'notes' => $request->notes,
        ];
        
        
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
