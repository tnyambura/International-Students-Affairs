<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
