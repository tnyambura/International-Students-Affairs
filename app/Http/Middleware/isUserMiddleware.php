<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class isUserMiddleware
{
    public function handle(Request $request, Closure $next){
        
        if (Auth::check()){
            $user = Auth::user();
            $userRole = DB::table('user_roles')->select('role')->where('user_id',$user->id)->limit(1)->get()[0]->role;
            if(strtolower($userRole) === 'student'){
                return $next($request);
            }else{
                return redirect('/');
            }
        }
        return redirect('/');
    }
}