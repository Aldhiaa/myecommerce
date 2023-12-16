<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliverCityFee extends Controller
{
    public function createcityfee(){
        
        return view('Backend.DeliverdCity.addcity');
    }
}
