<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\studentactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\addNewStudent;
use App\Models\applykpp;
use App\Models\BookingList;
use App\Models\MySchedule;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use DB;


class DashboardController extends Controller
{
    public function AvailabilityGetter(){
        $availability = DB::table('all_availability')->limit(1)->get();
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
    public function UpdateMeetings(){
        $lastMeeting = DB::table('bookingList')->where('status','pending')->get();
        if(sizeOf($lastMeeting)>0){
            foreach ($lastMeeting as $value) {
                if(date('Y-m-d',strtotime($value->booked_date_time)) < date('Y-m-d')){
                    DB::table('bookingList')->where('id',$value->id)->update(['status'=>'past']);
                }
            }
        }
    }
    public function GetAllbookedMeeting(){
        // $lastMeeting = DB::table('bookingList')->where('student_id',Auth::user()->id)->where('status','pending')->limit(1)->get();
        $res = [];
        // if(sizeOf($lastMeeting)>0){
        //     if(date('Y-m-d',strtotime($lastMeeting[0]->booked_date_time)) < date('Y-m-d')){
        //         DB::table('bookingList')->where('id',$lastMeeting[0]->id)->update(['status'=>'past']);
        //     }
        // }
        $data = DB::table('all_bookings')->where('u_id',Auth::user()->id)->get();
        if(sizeOf($data) > 0){
            $res = $data;
        }
        return $res;
    }
    public function getStatistics($year){
        
        $kppsReq = DB::table("kpps_application")->where('application_date','LIKE',$year.'%')->get();
        $ExtReq = DB::table("extension_application")->where('application_date','LIKE',$year.'%')->get();
        $BdReq = DB::table("buddy_request")->where('request_date','LIKE',$year.'%')->get();
        $AppointmentReq = DB::table("bookingList")->where('booked_date_time','LIKE',$year.'%')->get();

        $data = ['kpps'=>$kppsReq, 'ex'=>$ExtReq, 'bd'=>$BdReq, 'meet'=>$AppointmentReq];

        return $data;
    }

    public function statReport(Request $req){
        $allStd = DB::table("user_roles")->where('role','student')->get();
        $year = $req->year;

        $pdf = PDF::setOptions(['isPhpEnabled' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true])->LoadView('Layouts/AdminActions/statisticsReport',['NoStudents'=>sizeOf($allStd),'data'=>$this->getStatistics($year),'year'=>$year]);

        return $pdf->download($req->year.'_Statistics.pdf');
    }
    public function statisticsReport(Request $req){
        $getYear = $req->year;
        $allStd = DB::table("user_roles")->where('role','student')->get();

        // $pdf = PDF::setOptions(['isPhpEnabled' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true])->LoadView('Layouts/AdminActions/statisticsReport',['NoStudents'=>sizeOf($allStd),'data'=>$this->getStatistics($getYear),'year'=>$getYear]);
        // return $pdf->download($getYear.'_Statistics.pdf');

        return view('Layouts/AdminActions/statisticsReport',['NoStudents'=>sizeOf($allStd),'data'=>$this->getStatistics($getYear),'year'=>$getYear]);
    }
    public function KppAppProgressCatcher( Request $req){
        $id = $req->user()->id; $res = false;
        $kppApp = DB::table('kpps_application')->where('student_id',$id)->get();
        foreach ($kppApp as $value) {
            if($value->application_status == 'pending'){ $res = $value->application_status; break; }
            if($value->application_status == 'in progress'){ $res = $value->application_status; break; }
            if($value->application_status == 'approved' && $value->first_open === 'new approved'){ $res = $value->application_status; break; }
        }
        return $res;
    }
    public function ExtAppProgressCatcher( Request $req){
        $id = $req->user()->id; $res = false;
        $ExtApp = DB::table('extension_application')->where('student_id',$id)->get();
        foreach ($ExtApp as $ext) {
            if($ext->application_status == 'pending'){ $res = $ext->application_status; break; }
            if($ext->application_status == 'in progress'){ $res = $ext->application_status; break; }
            if($ext->application_status == 'approved' && $ext->first_open == 'new approved'){ $res = $ext->application_status; break; }
        }
        return $res;
    }

    public function index(Request $request){
        $this->UpdateMeetings();
        if(!Auth::user()){
            return redirect('/');
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
                        redirect('/');
                        break;
                }
            }else{
                redirect('/');
            }
            if(sizeOf($fetcher) > 0){
                $is_buddy=false;
                $IsABubby = DB::table("user_roles")->where('user_id',Auth::user()->id)->where('role','buddy')->get();
                
                if(sizeOf($IsABubby) > 0){ $is_buddy=true;}
                return view($userRoleVal,['user'=>$fetcher[0],'is_buddy'=> $is_buddy, 'availability'=>$this->AvailabilityGetter(), 'myAppointments'=>$this->GetAllbookedMeeting(),'NoExt'=>studentactions::NotOpenedExt(),'NoKpps'=>studentactions::NotOpenedKpps(),'ProgressAppData'=>[$this->ExtAppProgressCatcher($request),$this->KppAppProgressCatcher($request)],'ExpireDocs'=>studentactions::DocumentExpiry()]);
            }else{
                $allStd = DB::table("user_roles")->where('role','student')->get();
                $kppsReq = DB::table("kpps_application")->get();
                $ExtReq = DB::table("extension_application")->get();
                $BdReq = DB::table("buddy_request")->get();
                $AppointmentReq = DB::table("bookingList")->get();
                return view($userRoleVal,['NoStudents'=>sizeOf($allStd),'KppStatistics'=>$kppsReq,'ExtStatistics'=>$ExtReq,'BuddyStatistics'=>$BdReq,'MeetingStatistics'=>$AppointmentReq]);
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
