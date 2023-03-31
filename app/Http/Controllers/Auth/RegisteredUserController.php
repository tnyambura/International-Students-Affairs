<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CountryController;
use App\Models\User;
use App\Models\Role;
use App\Models\addNewStudent;
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
    
     public function getCountries(){
        $get_data= CountryController::readFile();
        $country = array();
        foreach($get_data as $key => $data){
            if($key > 0){
                array_push($country , $data[0]);
            }
        }
        return $country;
    }

    Public function AddNewUser(){
        $roles = ['admin','super_admin','buddy'];
        return view('Layouts/AdminActions/addnewuser', ['roles'=>$roles,'countries'=>$this->getCountries()]);
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

        $request->validate([
            'otherNAMES' => 'required|string|max:255',
            'surNAME' => 'required|string|max:255',
            'suID' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_role' => 'required|string',
        ]);

        $post = new addNewStudent();
        $postRole = new Role();

        $post->id = $request->suID;
        $post->surname = $request->surNAME;
        $post->other_names = $request->otherNAMES;
        $post->email = $request->email;
        $post->password = Hash::make('123456');
        $post->status = 1;

        $postRole->user_id = $request->suID;
        $postRole->role = $request->user_role;

        $post->timestamps = false;
        $postRole->timestamps = false;
        
        $post->save();
        $postRole->save();
        
        return back()->with('New_User_Added','A New User has been Enrolled Successfully');
        }else{
            return back()->with('New_User_failed','A user with Same suID is already Registered');    
        }

    }
}
