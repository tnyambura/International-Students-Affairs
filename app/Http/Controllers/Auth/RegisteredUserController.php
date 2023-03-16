<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    
    Public function AddNewUser(){
        return view('Layouts/AdminActions/addnewuser');
    }
    Public function SuperAddNewUser(){
        return view('Layouts/SuperAdminActions/addnewuser');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {   
        $id = $request -> suID;
        $Student_data = DB::select("select * from users WHERE id= $id ");

        if($Student_data == false){

        $password = 'Kenya2030**';

        $request->validate([
            'otherNAMES' => 'required|string|max:255',
            'surNAME' => 'required|string|max:255',
            'suID' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'id' => $request->suID,
            'surname' => $request->surNAME,
            'other_names' => $request->otherNAMES,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);
        
        $user->attachRole($request->role_id);
        event(new Registered($user));
        
        return back()->with('New_User_Added','A New User has been Enrolled Successfully');
        }else{
            return back()->with('New_User_failed','A user with Same suID is already Registered');    
        }

    }
}
