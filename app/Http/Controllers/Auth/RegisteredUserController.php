<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FacultiesController;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Role;
use App\Models\addNewStudent;
use App\Models\Guides;
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
    
    public static function Guides(){
        $Guides = false;
        if(sizeOf(Guides::all())>0){ $Guides = collect(Guides::all())->toArray(); }
        
        // $Guidesooo = [
        //     ['International students Guide Booklet','guide.pdf'],
        //     ['Student Pass Applications Requirements - First Time Applications','newKpp.php'],
        //     ['Student Pass Applications Requirements - For Renewals','kppsRenewal.php'],
        //     ['Jubilee Medical Insurance - Write up and Membership','jubilee.php']
        // ];
        // $Guides = [
        //     [
        //         ['IS Guide Booklet','guide.pdf'],
        //         ['Student Pass(Kpps) Requirements - First Time Applications','newKpp.php']
        //     ],
        //     [
        //         ['Student Pass(Kpps) Requirements - Renewals','kppsRenewal.php'],
        //         ['Jubilee Medical Insurance','jubilee.php']
        //     ]
        // ];
        return $Guides;
    }
    public static function GetMoreLinks(){
        $more_links = [
            [
                'title'=>"About Us",
                'link'=>"https://susa.strathmore.edu/our-services/international-students/",
                'icon'=>'fas fa-book-open'
            ],
            [
                'title'=>"Forgot Password",
                'link'=>"/forgotpassword",
                'icon'=>'fas fa-user-lock'
            ],
            [
                'title'=>"AMS",
                'link'=>"https://su-sso.strathmore.edu/susams/servlet/edu/strathmore/ams/susams/Init.html",
                'icon'=>'fas fa-chalkboard-teacher'
            ],
            [
                'title'=>"E-learning",
                'link'=>"https://elearning.strathmore.edu/login/index.php",
                'icon'=>'fas fa-book-reader'
            ],
            [
                'title'=>"Sign in",
                'link'=>"/login",
                'icon'=>'fas fa-door-open'
            ],
            [
                'title'=>"Sign up",
                'link'=>"/signup",
                'icon'=>'fas fa-user-plus'
            ],
        ];
        return collect($more_links);
    }
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
    public static function getFaculties(){
        $get_data= FacultiesController::readFile();
        $faculties = array();
        foreach($get_data as $key => $data){
            if($key > 0){
                array_push($faculties , $data[0]);
            }
        }
        return $faculties;
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
        return view('Layouts/AdminActions/addnewuser', ['Guides'=>$this->Guides(),'newVisaReq'=>adminactions::newVisaNotify(),'BdCountReq'=>adminactions::BdCount(),'roles'=>$roles,'countries'=>$this->getCountries(),'courses'=>$this->getCourses(),'faculties'=>$this->getFaculties()]);
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
        
        if($post->save() && $postRole->save()){
            $EmailTitle = 'Welcome to International Student Affaires.';
            $subject = 'Account Creation';
            $msg='
            <p>Your account has successfully been created. Click on the link below to access the system. </p>
            <p><a href="http://localhost:8000/" style="padding:5px; border-radius:5px; background:rgb(17,60,122); color:#fff; ">Login Now</a></p>
            <p>Please remember to change your password to improve your account security. </p>';

            return back()->with('success','User successfully added');
            // return redirect()->route('emailsend',[$subject, $request->email,$EmailTitle,Crypt::encryptString($msg)]);

        }
        }else{
            return back()->with('fail','A user with Same suID is already Registered');    
        }

    }
}
