<?php

namespace App\Http\Controllers;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class KuraimiBankController extends Controller
{
    public function StripeOrder(Request $request){       
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        // Set the endpoint URL provided by the supplier
        $endpointUrl = 'https://12.33.XXX.XXX:443/webapi/xyz';
        
        // Set the authentication credentials
        $username = 'Supplier2021';
        $password = 'Admin123';
        
        // Set the customer details
        $customerID = '85547';
        $mobileNo = '1234565';
        $email = 'customer@gmail.com';
        $customerZone = 'YE0012004';
        
        // Build the request payload
        $data = [
            'SCustID' => $customerID,
            'MobileNo' => $mobileNo,
            'Email' => $email,
            'CustomerZone' => $customerZone,
        ];
        
        // Send the request
        $response = Http::withBasicAuth($username, $password)
            ->post($endpointUrl, $data);
        
        // Check the response status
        if ($response->successful()) {
            // Request succeeded, handle the response data
            $responseData = $response->json();
            // Process the response data as needed
            // ...
        } else {
            // Request failed, handle the error
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // Handle the error based on the provided information
            // ...
        }



       

        $charge = Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Easy Mulit Vendor Shop',
          'source' => $token,
          'metadata' => ['order_id' => 'ordS' . substr(uniqid(), 0, 8)]
        ]);

        
        
        $data = Session::get('checkout_data');
        dd($data);
        dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'state_id' => $data['state_id'],
            'name' => $data['shipping_name'],
            'email' => $data['shipping_email'],
            'phone' => $data['shipping_phone'],
            'adress' => $data['shipping_address'],
            'post_code' => $data['post_code'],
            'notes' => $data['notes'],

            'payment_type' => $charge->payment_method,
            'payment_method' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(), 

        ]);

             // Start Send Email

             $invoice = Order::findOrFail($order_id);

             $data = [
     
                 'invoice_no' => $invoice->invoice_no,
                 'amount' => $total_amount,
                 'name' => $invoice->name,
                 'email' => $invoice->email,
     
             ];
             Mail::to($request->email)->send(new OrderMail($data));
     
             // End Send Email 
     
        $carts = Cart::content();
        foreach($carts as $cart){

            Order_item::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->options->vendor_id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),
          
            ]);
        } // End Foreach

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }
        if (Session::has('checkout_data')) {
            Session::forget('checkout_data');
         }
        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }// End Method 




// $response = Http::withHeaders([
//     'Authorization' => 'Basic e3VzZXJuYW1lfTp7cGFzc3dvcmR9',
//     'Host' => 'URL provided(http://12.33.XXX.XXX:80/webapi/xyz)',
//     'Accept' => 'application/json',
//     'Content-Type' => 'application/json',
// ])
//     ->post('https://12.33.XXX.XXX:443/webapi/xyz', [
//         'SCustID' => '85547',
//         'MobileNo' => '1234565',
//         'Email' => 'customer@gmail.com',
//         'CustomerZone' => 'YE0012004',
//     ]);

// if ($response->successful()) {
//     $data = $response->json();
//     // Process the response data
// } else {
//     // Handle the failed request
//     $statusCode = $response->status();
//     $errorMessage = $response->body();
// }
}


