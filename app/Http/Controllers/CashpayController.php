<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CashpayController extends Controller
{
    public function cashOrder(Request $request){
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => '{{baseUrl}}/v1/CashPay/CreateOrder',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "requestId": "51445544621",
          "currencyID": 2,
          "payementTime": 5,
          "beneficiaryList": [
            {
              "identifier": "77-------",
              "identifierType": 1,
              "amount": $total_amount,
              "itemName": "ساعة"
            }
          ],
          "des": "شراء ساعة"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer *********************',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
    }
}
