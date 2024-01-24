<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\LoginCode;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\VerifyOtpRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout','verifyOtp');
    }

    public function username()
    {
        return 'phone';
    }

    public function sendOtp(PhoneRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'بيانات الدخول غير صحيحة');
        }
        if ($user->status === 0) {
            return redirect()->back()->with('error', 'ممنوع الدخول');
        }
        $res = LoginCode::send($request->phone);
        if ($res->statusCode != 201) {
            return redirect()->back()->with('error', 'حدث خطا : ' . $res->message);
        } elseif ($res->statusCode == 201) {
            return redirect()->route('loginCode',['hash' => Crypt::encryptString($user->id)])->with('success', 'تم ارسال رمز التحقق الي رقم الهاتف ' . $request->phone);
        } else {
            // dd($res);
            return redirect()->back()->with('error', 'حدث خطا : ' . $res->statusCode);

        }}



    public function verifyOtp(Request $request)
    {
        if(!$request->userId){
            return redirect()->route('login')->with('error' , 'خطأ في تسجيل الدخول برجاء المحاولة مرة اخري');
        }
        $userId = Crypt::decryptString($request->userId);
        $user = User::find($userId);
        if(!$user){
            return redirect()->route('login')->with('error' , 'خطأ في تسجيل الدخول برجاء المحاولة مرة اخري');
        }
        $key = $request->otp;
        // dd(LoginCode::attempt($key, $user->phone));
        if (LoginCode::attempt($key, $user->phone)) {
            return redirect()->route('front.home')->with("success" ,"تم تسجيل الدخول بنجاح");
        }
        return back()->with(['errors' => 'Otp Not Found']);
    }
}
