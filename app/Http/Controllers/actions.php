<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actions extends Controller
{
    public function NewRequests(){
        return view('Layouts/kpp-Requests');
    }
    public function NewVisaRequests(){
        return view('Layouts/NewVisaRequests');
    }
     public function Newstudentpass(){
        return view('Layouts/studentActions/RequestNewKPP');
    }
}
