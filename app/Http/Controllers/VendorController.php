<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function VendorDashboard(){
        
        return view('vendor.index');
    }

    public function vendorlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function vendorprofile(){
        $id =Auth::user()->id;
        $vendorInfo=User::find($id);
        

        return view('vendor.profile',compact('vendorInfo'));
    }

    public function profileupdate(request $request){
        $id =Auth::User()->id;
        $user =User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->address =$request->address;
        $user->vendor_join =$request->vendor_join;
        $user->vendor_info =$request->vendor_info;

        $user->save();
        return redirect()->route('vendor.profile')->with('message','data updated Successfully');
    }

    public function updatephoto(request $request)
    {   
        $id =Auth::User()->id;
        $user =User::find($id);
        if ($request->hasfile('photo')) {
            @unlink(public_path('upload/vendor_images',$user->photo));
            $file =$request->file('photo');
            $filename =date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'),$filename);
            $user->photo=$filename;
       }
       $user->save();

       return redirect()->route('vendor.profile')->with('message','photo updated Successfully');
       
    }
    public function vendorupdate_password(Request $request)
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
    
        return redirect()->route('vendor.dashboard')->with('status', 'Password changed successfully');
    }
    public function vendorchange_password(){
        $id =Auth::User()->id;
        $user =User::find($id);

        return view('vendor.password',compact('user'));
    }

    public function BecomeVendor(){
        
        return view('auth.becomeVendor');
    }
    public function VendorRegister(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);



        return redirect()->route('login');
    }
}
