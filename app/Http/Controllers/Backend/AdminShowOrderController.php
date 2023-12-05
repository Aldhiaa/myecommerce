<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order_item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminShowOrderController extends Controller
{
    public function showVendorDetails($id){
        $vendor =User::where('id',$id);
        $order_item =Order_item::where('vendor_id',$id);
        return view('Backend.orders.vendor',compact('order_item','vendor'));
    }
}
