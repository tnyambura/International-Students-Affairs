<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CoursesController;
use App\Models\User;
use App\Models\Role;
use App\Models\addNewStudent;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\adminactions;
use DB;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    
    public static function getCourses(){
        $get_data= CoursesController::readFile();
        $courses = array();
        foreach($get_data as $key => $data){
            if($key > 0){
                array_push($courses , [$data[0],$data[1]]);
            }
        }
        return $courses;
    }
    public static function getCountries(){
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
        $roles = ['admin','super_admin'];
        return view('Layouts/AdminActions/addnewuser', ['newVisaReq'=>adminactions::newVisaNotify(),'BdCountReq'=>adminactions::BdCount(),'roles'=>$roles,'countries'=>$this->getCountries(),'courses'=>$this->getCourses()]);
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
    public function activate_user($email){
        
    }

    public function store(Request $request)
    {   
        $id = $request -> id;
        $Student_data = DB::table("users")->where('id',$id)->get();

        if(sizeOf($Student_data) <1){

        $request->validate([
            'otherNAMES' => 'required|string|max:255',
            'surNAME' => 'required|string|max:255',
            'id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_role' => 'required|string',
        ]);

        $post = new addNewStudent();
        $postRole = new Role();

        $post->id = $request->id;
        $post->surname = $request->surNAME;
        $post->other_names = $request->otherNAMES;
        $post->email = $request->email;
        $post->password = Hash::make('123456');
        $post->status = 1;

        $postRole->user_id = $request->id;
        $postRole->role = $request->user_role;

        $post->timestamps = false;
        $postRole->timestamps = false;
        
        // $post->save();
        // $postRole->save();
        if($post->save() && $postRole->save()){
            $msg='Your account has successfully created. Click the link below to get access. ';
            return redirect()->route('emailsend',[$request->email,$msg]);
        }
        // return back()->with('New_User_Added','A New User has been Enrolled Successfully');
        }else{
            return back()->with('New_User_failed','A user with Same suID is already Registered');    
        }

    }
}
