<?php

namespace App\Utility;

use App\Models\OtpConfiguration;
use App\Models\SmsTemplate;
use App\Models\User;
use App\Services\SendSmsService;

class BulkSms
{

 //Send message
    public function send($to, $from, $text, $template_id)
    {
        // dd($to, $from, $text, $template_id);
         
        // $url = "http://bulksmsbd.net/api/smsapi";
        // $api_key = "your api key";
        // $senderid = "your sender id";
        // $number = "88016xxxxxxxx,88019xxxxxxxx";
        // $message = "test sms check";
     
        // $data = [
        //     "api_key" => env('BULKSMS_API_KEY'),
        //     "senderid" =>env('BULKSMS_SENDER_ID'),
        //     "number" => $to,
        //     "message" => $text
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // return $response;

        // $url = "http://bulksmsbd.net/api/smsapi";
        // $api_key = "FoRosCGX5i38zZKDs9QO";
        // $senderid = "8809617619444";
        // $number = "8801835488471";
        // $message = "test sms check";
     
        // $data = [
        //     "api_key" => $api_key,
        //     "senderid" => $senderid,
        //     "number" => $number,
        //     "message" => $message
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // // return $response;
        // dd($response);
    }
}