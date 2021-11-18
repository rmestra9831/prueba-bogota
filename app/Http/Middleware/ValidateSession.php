<?php

namespace App\Http\Middleware;

use App\Models\SessionModel;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ValidateSession
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
            $lastLogin = auth()->user()->last_session;
            $result = date('Y-m-d H:i:s', $lastLogin);
            $lastSession = Carbon::create($result);
            $dateNow = Carbon::now();

            if ($dateNow < $lastSession->addHours(24)) {
                return $next($request);
            }else{
                return redirect('/sesiones');
            }
        } catch (\Throwable $th) {
            return 'ha ocurrido un error';
        }
    }
}
