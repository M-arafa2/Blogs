<?php 
namespace App\Service;

use Illuminate\Support\Facades\Http;

class Nafaz  
{
    private static $clientId = '18638935-ac206f06dae442a5b761ea57f8eac5a5';
    private static $clientSecret = '75ea10b1138445b3b8728452830c8b58';

    public static function auth()
    {
            $url = 'https://iamstaging.semati.sa/idhub/oidc/v1/authorize';
            $data = [
                'client_id' => self::$clientId,
                'redirect_uri'=>'https://aa.law-mawthuq.com/',
                'response_type'=> 'code',
                'scope' => 'openid',
            ];
            $url = $url . '?' . http_build_query($data);
            $response = Http::accept('application/json')->get($url);
            return $response->json();
    }

    public static function token($code)
    {
        $url = 'https://iamstaging.semati.sa/idhub/oidc/v1/token';
        $data = [
            'client_id' => self::$clientId,
            'client_secret'=> self::$clientSecret,
            'grant_type'=>'authorization_code',
            'scope'=>'openid',
            'code'=>$code,
            'redirect_uri'=>'https://aa.law-mawthuq.com/',
        ];
        $response = Http::withHeaders([ 
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post($url,$data);
        return $response->json();
  
    }


}

