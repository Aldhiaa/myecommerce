<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AUserController extends Controller
{
    public function alluser(){
        $users =User::where('role','user')->get();
        return view('Backend.users.allusers',compact('users'));
    }
    public function AuserDetails($id){
        $userDetails =User::findOrFail($id);
        
        return view('Backend.users.details',compact('userDetails'));
    }
    
}
