<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GenerateCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('email', $request['email'])->first();
        $ip = $request->ip();
        if ($ip == '127.0.0.1' && $user->role[0]->id == 1) {
            Cookie::make('origin_sesion','El origen 8');
            return $next($request)->withCookie(cookie('origin_sesion', 'Una cookie'));
        }else{
            Cookie::forget('origin_sesion');
            return $next($request)->withCookie(Cookie::forget('origin_sesion'));
        }
    }
}
