<?php

namespace App\Service;

use Nafezly\Payments\Classes\ClickPayPayment;

class ClickPay
{
    public static function store($cart, $user)
    {
        /*        $currency = env('clickpay_currency','SAR');
                $key = env('clickpay_test_server_key');
                $profile = env('clickpay_test_profile_id');

                $payment = [
                    "profile_id" => $profile,
                    "cart_amount" => $cart->total,
                    "cart_currency" =>  $currency,
                    "cart_description" =>  'cart_description',
                    "cart_id" => "$cart->id",
                    //"callback" => $route,
                    "return" => $route,
                    "tran_type" => 'sale',
                    "tran_class" => 'ecom',
                    "hide_shipping" => true,
                    "customer_details" => [
                        "name" => $user->name,
                        "email" => $user->email,
                        "street1" => "",
                        "city" => $user->city?->name,
                        "country" => $user->country?->name,
                        "phone" => $user->phone,
                    ],
                ];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://secure.clickpay.com.sa/payment/request",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($payment),
                    CURLOPT_HTTPHEADER => array(
                        "authorization:" . $key, // SECRET API KEY
                        "content-type: application/json"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                $response = json_decode($response);
        return $response;*/
        $payment = new ClickPayPayment();
        return $payment->pay($cart->total, $user->id, $user->name, $user->name, $user->email, $user->phone);
    }
}
