<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function khaltiverifiy(Request $request)
    {
       
        // $args = http_build_query(array(
        //     'token' => $request['data']['token'],
        //     'amount'  => 1000
        //   ));
          
        //   $url = "https://khalti.com/api/v2/payment/verify/";
          
        //   # Make the call using API.
        //   $ch = curl_init();
        //   curl_setopt($ch, CURLOPT_URL, $url);
        //   curl_setopt($ch, CURLOPT_POST, 1);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          
        //   $headers = ['Authorization: Key test_secret_key_cd6a0ffde92e4966b416e168e73929d2'];
        //   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
        //   // Response
        //   $response = curl_exec($ch);
        //   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //   curl_close($ch);


        
        //   $data='ram';
        //   if($status_code==200)
        //   {
        return response()->json($request);
        //   }



    }
}
