<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class RoleMiddleware
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

        // if (!Auth::check()) 
        // return redirect('login');

        // $user = Auth::user();

        // $userRole = DB::table('user_roles')->where('user_id', '=',$user->id)->limit(1)->get();

                // $redirectTo ='';
        
        // if($userRole === 'student'){
        //     return $next($request);
        // }
        // if(1 == 1){
        // if($userRole === $role){
            // return $next($request);
        // }
        // if($user->isAdmin())
        //     return $next($request);

        // // foreach($roles as $role) {
        // if($user->hasRole($userRole))
        //         return $next($request);
        // // }
        // if($user->isSuperAdmin())
        // return $next($request);

        // foreach($roles as $role) {
        // if($user->hasRole($role))
        //     return $next($request);
        // }
        // if($user->normalUser())
        // return $next($request);

        // foreach($roles as $role) {
        // if($user->hasRole($role))
        //     return $next($request);
        // }

        // return redirect('login');
    }
}
