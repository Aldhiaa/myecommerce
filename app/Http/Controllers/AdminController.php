<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Order;
class AdminController extends Controller
{
    public function AdminDashboard(){
        $date = date('d-m-y');
	    $today = Order::where('order_date',$date)->sum('amount');
	    $month = date('F');
	    $month = Order::where('order_month',$month)->sum('amount');
	    $year = date('Y');
	    $year = Order::where('order_year',$year)->sum('amount');
	    $pending = Order::where('status','pending')->get();
	    $vendor = User::where('status','active')->where('role','vendor')->get();
	    $customer = User::where('status','active')->where('role','user')->get();
        $orders=Order::all();
        
        return view('admin.index',compact('today','month','year','pending','vendor','customer','orders'));
    }
    public function Adminlogin(){
        
        return view('admin.login');
    }

    public function Adminlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function Adminprofile(){
        $id =Auth::user()->id;
        $adminInfo=User::find($id);
       

        return view('admin.profile',compact('adminInfo'));
    }
    public function profileupdate(request $request){
        $id =Auth::User()->id;
        $user =User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->address =$request->address;

        $user->save();
        return redirect()->back()->with('message','data updated Successfully');
    }

    public function updatephoto(request $request)
    {   
        $id =Auth::User()->id;
        $user =User::find($id);
        if ($request->hasfile('photo')) {
            @unlink(public_path('upload/admin_images',$user->photo));
            $file =$request->file('photo');
            $filename =date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $user->photo=$filename;
       }
       $user->save();

       return redirect()->back()->with('message','photo updated Successfully');
       
    }
    public function Adminupdate_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
    
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'Old password is incorrect');
        }
    
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    
        return redirect()->route('admin.dashboard')->with('status', 'Password changed successfully');
    }

    public function Adminchange_password(){
        $id =Auth::User()->id;
        $user =User::find($id);

        return view('admin.password',compact('user'));
    }
    public function InactiveVendor(){
        $inactivevendor =User::where('status','inactive')->where('role','vendor')->latest()->get();
        
        return view('Backend.vendor.inactive_vendor',compact('inactivevendor'));
    }

    public function ActiveVendor(){
        $activevendor =User::where('status','active')->where('role','vendor')->latest()->get();
        
        return view('Backend.vendor.active_vendor',compact('activevendor'));
    }

    public function VendorDetails($id){
        $vendorDetails =User::findOrFail($id);
        
        return view('Backend.vendor.details',compact('vendorDetails'));
    }

    public function VendorActiveapprove(Request $request){
        $vendor_id =$request->id;
        $user =User::findOrFail($vendor_id)->update([
            'status' => 'active',
        ]);
        return redirect()->route('active.vendor')->with('status', 'status changed successfully');
    }

    public function activeVendorDetails($id){
        $vendorDetails =User::findOrFail($id);
        
        return view('Backend.vendor.activedetails',compact('vendorDetails'));
    }

    public function Vendorinactiveapprove(Request $request){
        $vendor_id =$request->id;
        $user =User::findOrFail($vendor_id)->update([
            'status' => 'inactive',
        ]);
        return redirect()->route('inactive.vendor')->with('status', 'status changed successfully');
    }
    ///////////// Admin All Method //////////////


    public function AllAdmin(){
        $alladminuser = User::where('role','admin')->latest()->get();
        return view('backend.admin.all_admin',compact('alladminuser'));
    }// End Mehtod
    
    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.admin.add_admin',compact('roles'));
    }// End Mehtod 
    public function AdminUserStore(Request $request){

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

         $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }// End Mehtod 
    public function EditAdminRole($id){

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin',compact('user','roles'));
    }// End Mehtod 


    public function AdminUserUpdate(Request $request,$id){


        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address; 
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

         $notification = array(
            'message' => 'New Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }// End Mehtod 

    public function DeleteAdminRole($id){

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

         $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Mehtod 





}
