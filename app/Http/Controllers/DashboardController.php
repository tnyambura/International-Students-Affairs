<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\addNewStudent;
use App\Models\applykpp;
use App\Models\BookingList;
use App\Models\MySchedule;
use DB;


class DashboardController extends Controller
{
    public function AvailabilityGetter(){
        $availability = DB::table('all_availability')->get();
        $data = [];
        foreach ($availability as $value) {
            $userData = [];
            array_push($userData,$value->surname.' '.$value->other_names);
            array_push($userData,$value->user_id);
            array_push($userData,json_decode($value->my_schedule));

            array_push($data,$userData);
        }
        return $data;
    }
    public function GetAllbookedMeeting(){
        $data = DB::table('all_bookings')->where('u_id',Auth::user()->id)->get();
        return $data;
    }
    public function index(Request $request){
        if(!Auth::user()){
            return redirect('/login');
        }else{
            $userRoleGetter = DB::table('user_roles')->where('user_id', '=',Auth::user()->id)->limit(1)->get();
            $fetcher =[];
            $userRoleVal ='';
            if(sizeOf($userRoleGetter) > 0){
                switch ($userRoleGetter[0]->role) {
                    case 'admin':
                        $userRoleVal = 'Layouts.adminHome';
                        break;
                    
                    case 'super_admin':
                        $userRoleVal = 'Layouts.adminHome';
                        break;
                    
                    case 'student':
                        $userRoleVal = 'Layouts.studentDash';
                        $id = Auth::user()->id; 
                        if($id){
                            $user =  DB::table('users')->select('surname','other_names','email')->where('id',$id)->limit(1)->get();
                            $userDetails =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
                            array_push($fetcher, array_merge((array)$user[0],(array)$userDetails[0]));
                        }
                        
                        break;
                    
                    default:
                        redirect('/login');
                        break;
                }
            }else{
                redirect('/login');
            }
            if(sizeOf($fetcher) > 0){
                $is_buddy=false;
                $IsABubby = DB::table("user_roles")->where('user_id',Auth::user()->id)->where('role','buddy')->get();
                
                if(sizeOf($IsABubby) > 0){ $is_buddy=true;}
                return view($userRoleVal,['user'=>$fetcher[0],'is_buddy'=> $is_buddy, 'availability'=>$this->AvailabilityGetter(), 'myAppointments'=>$this->GetAllbookedMeeting()]);
            }else{
                return view($userRoleVal);
            }
        }
    // if(Auth::user()->hasRole('student')){
    //     return view('Layouts.studentDash');
    // }
    // elseif(Auth::user()->hasRole('admin')){
    //     $data= applykpp::all('id','otherNAMES','passportNUMBER','updated_at','biodataPAGE','currentVISA','policeCLEARANCE','dateofENTRY','Nationality','created_at');
    //     return view('Layouts.adminHome',['data'=>$data]);
    // }
    // elseif(Auth::user()->hasRole('super_admin')){

    //    $data= addNewStudent::all('id','suID','passportNUMBER','suEMAIL','surNAME','firstNAME','lastNAME','Course','Nationality');
    //    return view('Layouts.superadminHome',['students'=>$data]);
    // }
    // else{
    //     return  redirect('/login');
    //   }

    }
}
