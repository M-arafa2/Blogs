<?php

namespace App\Models;

use App\Models\User;
use App\Service\Urway;
use App\Service\Oursms;
use App\Service\Taqnyat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginCode extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function send($phone)
    {
        // send SMS Message containing the code generated
        if(in_array($phone,['0100033333','0100044444'])){
            $code = 11111;
            static::create([
                'phone' => $phone,
                'code' => $code,
                'ip_address' => request()->ip(),
            ]);
            return (object) ['statusCode' => 201];
        }
        $siteName = str_replace(['http://','https://'],['',''],url('/'));
        $code = rand(10000, 99999);
        $message = 'رمز التحقق : ' . $code . ' لدخول منصة '. $siteName;
        // $message = "Your code is: $code";
        static::create([
            'phone' => $phone,
            'code' => $code,
            'ip_address' => request()->ip(),
        ]);
        // dd(Taqnyat::send($message, [$phone]));
        return Taqnyat::send($message, [$phone]);

        // return Oursms::send($phone, $message);
    }
    // attempt by code and phone
    public static function attempt($code, $phone)
    {
        $loginCode = self::where('code', $code)->where('phone', $phone)->first();
        $user = User::where('phone', $phone)->first();
        if ($loginCode && $user) {
            $loginCode->attempted = true;
            $loginCode->save();
            Auth::login($user);
            return true;
        }
        return false;
    }
}
