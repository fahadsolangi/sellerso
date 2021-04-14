<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class supplier
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == 1){
            return $next($request);
        } else {
            return redirect()->route('supplier_login',['redirectTo'=>$request->url()])->with('notify_error','You need to login before accessing Supplier Dashboard');
        }
    }
    public function terminate($request, $response){
    	
    }
}
