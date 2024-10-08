<?php

namespace App\Services\OTP;

use App\Contracts\SendSms;

class Bulksms implements SendSms {
    public function send($to, $from, $text, $template_id) {
        // dd($to, $from, $text, $template_id);
         $url = "http://bulksmsbd.net/api/smsapi";
         $data = [
             "api_key" => env("BULKSMS_API_KEY"), //put ssl provided api_token here
             "senderid" =>  env("BULKSMS_SENDER_ID"),
             "number" => $to,
             "message" => $text
         ];

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);
         curl_close($ch);
        // dd($response);
         return $response;
    }
}
// ec7d29f1