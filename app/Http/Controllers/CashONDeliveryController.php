<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Order_item; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use Illuminate\Support\Facades\Mail;
class CashONDeliveryController extends Controller
{
    public function cashONDELOrder(Request $request){       
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        $order_number =  uniqid();
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
            'payment_type' =>'pay on delivery',
            'payment_method' => 'pay on delivery',
            'amount' => $total_amount,
            'order_number' => $order_number,

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
