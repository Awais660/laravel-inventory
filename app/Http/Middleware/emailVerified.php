<?php

namespace App\Http\Middleware;
use App\Models\user;

use Closure;
use Illuminate\Http\Request;

class emailVerified
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
        if(session()->has("useremail")){
            $email=Session('useremail');
            $user = User::where('email', $email)->first();
            if($user->email_verified_at == false){
                return redirect('must-verify');
            }
        }
        return $next($request);
    }
}
