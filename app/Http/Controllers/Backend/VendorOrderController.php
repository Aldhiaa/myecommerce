<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
class VendorOrderController extends Controller
{
    public function VendorOrder(){

        $id = Auth::user()->id;
        $orderitem = Order_item::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.Backend.orders.pending_orders',compact('orderitem'));
    } // End Method 

}
