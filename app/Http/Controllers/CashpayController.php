<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\AES;
use phpseclib\Math\BigInteger;
use Illuminate\Http\Request;

class CashpayController extends Controller
{
    public $encPassword;
    public function __construct()
    {
        $this->encPassword = $this->generateEncPassword();
    }
    function generateEncPassword()
    {
        $key = 'b14myc348a5e8765zfce2er5115a3401';
        $password = 'hQii"v61';
        $iv = str_repeat("\0", 16);
           
        $cipher = new AES('cbc');
        $cipher->setKey($key);
        $cipher->setIV($iv);
    
        $ciphertext = $cipher->encrypt($password);
        $encPassword = base64_encode($ciphertext);
    
        return $encPassword;
    }

    

    public function cashOrder(Request $request){
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        $spId ='3234657502184819';
        $username ='Reo1.pay';
        $unixTimestamp =time()*1000 ;
        // dd(time());
        $data =Session::get('checkout_data');
        $RequestID =substr(uniqid(), 0, 8);
        $mdToken =md5($spId . $username . $unixTimestamp);
        // dd($unixTimestamp,$mdToken,$this->encPassword);

        $headers = [
          'encPassword' =>  $this->encPassword,
          'unixtimestamp' => $unixTimestamp ,
          'Content-Type' => 'application/json'
        ];
        $body = [
          "RequestID"=> $RequestID,
          "UserName"=> $username,
          "SpId"=> $spId,
          "MDToken"=> $mdToken,
          "TargetMSISDN"=> "781737123",
          "CustomerCashPayCode"=> 555,
          "Amount"=> 3000,
          "CurrencyId"=> 2,
          "Desc"=> "... شراء عبر الموقع للاصناف "
        ];
       
        // Make the InitPayment API call
        $response = Http::withHeaders([
            $headers
        ])->post('https://www.tamkeenye.com:33291/CashPG/api/CashPay/InitPayment', $body);
        $result = $response->getBody()->getContents();
        // Process the response
        
        
       
        dd($unixTimestamp,$mdToken,$result,$this->encPassword);
        $resultCode = $response['ResultCode'];
        $resultMessage = $response['ResultMessage'];
        $transactionRef = $response['TransactionRef'];
    }




}
