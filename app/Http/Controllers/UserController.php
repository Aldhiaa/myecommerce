<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\SiteSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function UserDashboard(){
        $id=Auth::user()->id;
        $UserInfo=User::find($id);
        $setting = SiteSetting::find(1);
        $orders= Order::where('user_id',$id)->orderBy('id','DESC')->get();

        return view('user.dashboard',compact('UserInfo','orders','setting'));
    }
    public function UserOrderDetails($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('user.order.order_details',compact('order','orderItem'));

    }// End Method 
    public function UserOrderInvoice($order_id){

        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('user.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }// End Method 
    public function profileUpdate(request $request){
        $id =Auth::User()->id;
        $user =User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->address =$request->address;
        if ($request->hasfile('photo')) {
            @unlink(public_path('upload/user_images',$user->photo));
            $file =$request->file('photo');
            $filename =date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $user->photo=$filename;
       }
        $user->save();
        return redirect()->back()->with('message','data updated Successfully');
    }
    
    public function Userlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
