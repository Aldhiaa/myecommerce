<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Order_item; 
use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
{
    public function PendingOrder(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('Backend.orders.pending_orders',compact('orders'));
    } // End Method \
    public function AdminOrderDetails($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('Backend.orders.admin_order_details',compact('order','orderItem'));

    }// End Method

    public function AdminConfirmedOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('Backend.orders.confirmed_orders',compact('orders'));
    } // End Method 


 public function AdminProcessingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.orders.processing_orders',compact('orders'));
    } // End Method 


    public function AdminDeliveredOrder(){
        $orders = Order::where('status','deliverd')->orderBy('id','DESC')->get();
        return view('Backend.orders.delivered_orders',compact('orders'));
    } // End Method 
 
    public function AdminInvoiceDownload($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }// End Method 


}
