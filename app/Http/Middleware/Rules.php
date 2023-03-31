<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Rules
{
    public function handle(Request $request, Closure $next, $role){
        $user = Auth::user();
        $userRole = DB::table('user_roles')->select('role')->where('user_id',$user->id)->limit(1)->get()[0]->role;

        // if(strtolower($userRole) === strtolower($role)){


        // if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        // return redirect('login');


        // if($user->isAdmin())
        //     return $next($request);

        //     if($user->hasRole($role))
        //         return $next($request);

    // return redirect('login');
        if (Auth::check()){
            if($user->hasRole($role)){
                return $next($request);
            }else{
                return redirect('login');
            }
            // if($role === 'admin' || $role === 'super_admin')
            // {
            //     if($user->hasRole($role)){
            //         return $next($request);
            //     }else{
            //         return redirect('login');
            //     }
            // }
            // if($role === 'student')
            // {
            //     if($user->hasRole($role)){
            //         return $next($request);
            //     }else{
            //         return redirect('login');
            //     }
            //     // return $next($request);
            // }
            // if(strtolower($userRole) === 'admin' || strtolower($userRole) === 'super_admin')
            // {
            //     return $next($request);
            // }
            // if(strtolower($userRole) === 'student')
            // {
            //     return $next($request);
            // }
        }

        // if($role === 'admin' || $role === 'super_admin'){
        //     return $next($request);
        // }
        // if($role === 'student'){
        //     return $next($request);
        // }

        return redirect('login');
    }
}