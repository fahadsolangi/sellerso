<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class customer
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == 2){
            return $next($request);
        } else {
            return redirect()->route('login',['redirectTo'=>$request->url()])->with('notify_error','You need to login before accessing Customer Dashboard');
        }
    }
    public function terminate($request, $response){
    	
    }
}
