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
        
        return view('Layouts/studentDash');
    }
}
