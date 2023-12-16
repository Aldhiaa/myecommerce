<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TadhamanBankController extends Controller
{
    public function tadhamanOrder(Request $request){
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        $userName ='reiomarket';
        $password ='4570359144.1545';       
        $FromAccountNo= $request->AccountNo;

       
        $response = Http::post('https://mahtest.tadhamonbank.com:7006/AgentWs/resources/Agent/agentApiRequest', [
                $userName      =>'reiomarket',
                $password      =>'4570359144.1545',
                "fromAccount"  =>"776413777",
                "trans_type"   => "pos",
                "amount"       =>$total_amount, 
        ]);
        // Process the response
        $transNo = $response['transNo'];
        $FromAccountNo = $response['FromAccountNo'];
        $FromClientName = $response['FromClientName'];
        $amount = $response['amount'];
        $fee = $response['fee'];
        $total = $response['total'];
        $errCode = $response['errCode'];
        $errDesc = $response['errDesc'];
        
       
        dd($transNo);
        $resultCode = $response['ResultCode'];
        $resultMessage = $response['ResultMessage'];
        $transactionRef = $response['TransactionRef'];
    }




}
