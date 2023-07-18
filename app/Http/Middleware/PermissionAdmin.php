<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
 
class PermissionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::user()->level == "admin") {
        //     return $next($request);
        // }else{
        //     return redirect('/no-permission');
        // }

        foreach(Auth::user()->roles as $role){
            if($role['name'] == $request){
                return true;
            }
            return false;
        }
 
    }
}