<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermsAndCon;
class TermsController extends Controller
{
   public function index(){
    
    return view('trems.term');
   }
   public function add(){
    
    return view('trems.addterms');
   }
   
   public function store(Request $request){
      $validation =$request->validate([
          'trems.addterms' => 'required',
      ]);
      TermsAndCon::insert($request->term_text);

    return redirect()->route('add.terms.and.conditioins');
   }
}
