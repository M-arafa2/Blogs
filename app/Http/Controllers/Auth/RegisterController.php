<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\LoginCode;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'type' => ['required','in:user,vendor'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8'],
            'agree' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'type' => $data['type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($data)));
        $res = $this->sendOtp($request);
        // return $res->statusCode;
        if ($res->statusCode != 201) {
            return redirect()->back()->with('error', 'حدث خطا : ' . $res->statusCode);
        } elseif ($res->statusCode == 201) {
            // return response()->json(['success' => __('تم ارسال رمز التحقق بنجاح'), 'code' => $code], 200);
            return redirect()->route('loginCode',['hash' => Crypt::encryptString($user->id)])->with('success', 'تم ارسال رمز التحقق الي رقم الهاتف ' . $request->phone);
        } else {
            // dd($res);
            return redirect()->back()->with('error', 'حدث خطا : ' . $res->statusCode);

        }

       // return redirect()->route('login');
    }

    private function sendOtp($request)
    {
        // dd($request->all());
        $res = LoginCode::send($request->phone);
        $code = LoginCode::where('phone', $request->phone)->latest()->first()->code;
        return $res;
    }

    // public function phoneVerfiy(Request $request)
    // {
    //     $request->validate(['otp' => 'required']);

    //     $key = $request->otp;
    //     if (LoginCode::attempt($key, $request->phone)) {
    //         // $data = session()->get('data');
    //         // event(new Registered($user = $this->create($data)));

    //         $this->guard()->login($user);

    //         if ($response = $this->registered($request, $user)) {
    //             return $response;
    //         }
    //         session()->forget('data');
    //         return $request->wantsJson()
    //             ? new JsonResponse([], 201)
    //             : redirect($this->redirectPath());
    //     }
    //     return response()->json(['errors' => 'Otp Not Found'], 404);
    // }
}
