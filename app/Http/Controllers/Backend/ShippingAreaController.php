<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
class ShippingAreaController extends Controller
{
    public function AllDivision(){
        $division = ShipDivision::latest()->get();
        return view('Backend.ship.division.division_all',compact('division'));
    } // End Method 

    public function AddDivision(){
        return view('Backend.ship.division.division_add');
    }// End Method 


    public function StoreDivision(Request $request){ 
         // Validation rules
          $rules = [
           'division_name' => 'required',
           
           ];
           
           // Custom validation error messages
           $messages = [
               'division_name.required' => 'division title is required.',             
           ];
           $request->validate($rules, $messages);

        ShipDivision::insert([ 
            'division_name' => $request->division_name, 
        ]);

       $notification = array(
            'message' => 'ShipDivision Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.division')->with($notification); 

    }// End Method 
    public function EditDivision($id){

        $division = ShipDivision::findOrFail($id);
        return view('Backend.ship.division.division_edit',compact('division'));

    }// End Method 


     public function UpdateDivision(Request $request){
        // Validation rules
          $rules = [
           'division_name' => 'required',
           
           ];
           
           // Custom validation error messages
           $messages = [
               'division_name.required' => 'division title is required.',             
           ];
           $request->validate($rules, $messages);
        $division_id = $request->id;

         ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
        ]);

       $notification = array(
            'message' => 'ShipDivision Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.division')->with($notification); 


    }// End Method 


    public function DeleteDivision($id){

        ShipDivision::findOrFail($id)->delete();

         $notification = array(
            'message' => 'ShipDivision Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 


    /////////////// District CRUD ///////////////


    public function AllDistrict(){
        $district = ShipDistrict::latest()->get();
        return view('Backend.ship.district.district_all',compact('district'));
    } // End Method 

    public function AddDistrict(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        return view('Backend.ship.district.district_add',compact('division'));
    }// End Method 


public function StoreDistrict(Request $request){ 
        $rules = [
        'district_name' => 'required',
        
        ];
        
        // Custom validation error messages
        $messages = [
            'distric_name.required' => 'distric title is required.',             
        ];
        $request->validate($rules, $messages);
        
    ShipDistrict::insert([ 
            'division_id' => $request->division_id, 
            'district_name' => $request->district_name,
        ]);

       $notification = array(
            'message' => 'ShipDistricts Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification); 

    }// End Method
    
    public function EditDistrict($id){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('Backend.ship.district.district_edit',compact('district','division'));

    }// End Method 


    public function UpdateDistrict(Request $request){
$rules = [
        'district_name' => 'required',
        
        ];
        
        // Custom validation error messages
        $messages = [
            'distric_name.required' => 'distric title is required.',             
        ];
        $request->validate($rules, $messages);
        $district_id = $request->id;

         ShipDistrict::findOrFail($district_id)->update([
             'division_id' => $request->division_id, 
              'district_name' => $request->district_name,
        ]);

       $notification = array(
            'message' => 'ShipDistricts Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.district')->with($notification); 


    }// End Method 


     public function DeleteDistrict($id){

        ShipDistrict::findOrFail($id)->delete();

         $notification = array(
            'message' => 'ShipDistricts Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 

     /////////////// State CRUD ///////////////


     public function AllState(){
        $state = ShipState::latest()->get();
        return view('Backend.ship.state.state_all',compact('state'));
    } // End Method 


    public function AddState(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
         return view('Backend.ship.state.state_add',compact('division','district'));
    }// End Method 


    public function GetDistrict($division_id){
        $dist = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
            return json_encode($dist);

    }// End Method 
    
    public function StoreState(Request $request){ 
        $rules = [
            'state_name' => 'required',
            
            ];
            
            // Custom validation error messages
            $messages = [
                'state_name.required' => 'state title is required.',             
            ];
            $request->validate($rules, $messages);
        ShipState::insert([ 
            'division_id' => $request->division_id, 
            'district_id' => $request->district_id, 
            'state_name' => $request->state_name,
        ]);

       $notification = array(
            'message' => 'ShipState Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification); 

    }// End Method 

    public function EditState($id){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
         return view('Backend.ship.state.state_edit',compact('division','district','state'));
    }// End Method 


     public function UpdateState(Request $request){
            $rules = [
            'state_name' => 'required',
            
            ];
            
            // Custom validation error messages
            $messages = [
                'state_name.required' => 'state title is required.',             
            ];
            $request->validate($rules, $messages);
            $state_id = $request->id;

         ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id, 
            'district_id' => $request->district_id, 
            'state_name' => $request->state_name,
        ]);

       $notification = array(
            'message' => 'ShipState Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification); 


    }// End Method 

 public function DeleteState($id){

        ShipState::findOrFail($id)->delete();

         $notification = array(
            'message' => 'ShipState Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 

}
