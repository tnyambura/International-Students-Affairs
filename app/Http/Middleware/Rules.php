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
        // $userRole = DB::table('user_roles')->where('user_id', '=',$user->id)->limit(1)->get()[0]->role;

        // if(strtolower($userRole) === strtolower($role)){
        if($role === 'admin' || $role === 'super_admin'){
            return $next($request);
        }
        if($role === 'student'){
            return $next($request);
        }

        return redirect('login');
    }
}