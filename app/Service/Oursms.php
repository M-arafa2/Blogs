<?php


namespace App\Service;


use Illuminate\Support\Facades\Http;

class Oursms
{
    private static $token = 'ewp6Gdc9YgkOjlpECRne';
    private static $src = 'Reliable.sa';
    public static function send($phone, $message)
    {
        if (self::$token != '' and self::$src != '') {

            if (is_array($phone)) {
                $phone = implode(',', $phone);
            }

            $url = 'https://api.oursms.com/api-a/msgs';

            $data = [
                'token' => self::$token,
                'src' => self::$src,
                'dests' => $phone,
                'body' => $message,
            ];

            $url = $url . '?' . http_build_query($data);
            /* if (setting()->phone_verification_status == 'open') {

                $response = Http::get($url);

                return $response->json();
            } */
            return ['accepted' => 1, 'message' => 'Phone verification is closed'];
        }
        return -1;
    }
}
