<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){       
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        Stripe::setApiKey('sk_test_51O2KiyE7sT2KUqPdlOrwL9DW9H3OcYxg2l8mFPInHp86S7vf9fc8gAD3UJ25CFzodxKJbl4WL3c4rZgVXpLMpTkC00Eb8EzHcD');


        $token = $_POST['stripeToken'];

        $charge = Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Easy Mulit Vendor Shop',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()]
        ]);

         dd($charge);
        
         $data = Session::get('checkout_data');
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
}
