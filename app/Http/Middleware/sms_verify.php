<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LoginCode;
use Illuminate\Http\Request;

class sms_verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        // $user =auth()->user();
        // if (LoginCode::where('phone', $user->phone)->where('attempted', 0)->exists()) {
        //     return redirect()->route('loginCode');
        // }
        return $next($request);
    }
}
