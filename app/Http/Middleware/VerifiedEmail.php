<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifiedEmail
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
        try {
            $user = User::where('email', $request['email'])->first();
            if (!empty($user) && $user->email_verified_at != null) {
                return $next($request);
            }else{
                return redirect('/verificacion');
            }
        } catch (\Throwable $th) {
            return 'Ah ocurrido un error al momento de procesar tu solicitud';
        }
    }
}
