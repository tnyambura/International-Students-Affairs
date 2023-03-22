<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use DB;

class pages extends Controller
{
    public function AdminDash(){
        return view('Layouts/adminHome');
    }
    public function SuperdminDash(){
        return view('Layouts/superadminHome');
    }
    public function studentDash(){
        $id = Auth::user()->id; 
        $fetcher =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
        
        return view('Layouts/studentDash',['userDetails'=>$fetcher[0]]);
    }
}
