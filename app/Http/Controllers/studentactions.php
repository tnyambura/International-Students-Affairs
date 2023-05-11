<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\File;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FileUploader;
// use Auth;
use App\Models\addNewStudent;
use App\Models\addStudentDetails;
use App\Models\MySchedule;
use App\Models\BookingList;
use App\Models\studentGuardian;
use App\Models\userVerification;
use App\Models\Role;
use App\Models\buddies_allocation;
 use App\Models\Request_Buddy;
use App\Models\FetchCountries;
use App\Models\applykpp;
use App\Models\applyvisaextension;
use DB;
use Response;
use File;





class studentactions extends Controller
{

    
    public function CurrentDate(){
        date_default_timezone_set('africa/nairobi');
        $CurrentDate = date('Y-m-d H:i:s', time());

        return $CurrentDate;
    }
    public static function NotOpenedKpps(){
        $NoKpps = DB::table('kpps_application')->where('student_id',Auth::user()->id)->where('first_open','new approved')->get();
        return sizeOf($NoKpps);
    }
    public static function NotOpenedExt(){
        $NoExt = DB::table('extension_application')->where('student_id',Auth::user()->id)->where('first_open','new approved')->get();
        return sizeOf($NoExt);
    }
    public static function CountRemainingTime($visaName,$date){
        date_default_timezone_set("africa/nairobi");

        $month=date("m", strtotime($date));
        $day=date("d", strtotime($date));
        $year=date("Y", strtotime($date));

        $remainingDays = false;

        if(((int) $year - (int)date('Y')) == 0){
            $monthRemain = (int)$month - (int)date('m');
            if($visaName === 'passport'){
                if($monthRemain < 5 && $monthRemain > 1){
                    $remainingDays = 'in '.$monthRemain.' month(s).';
                }
            }
            if($visaName === 'kpp'){
                if($monthRemain < 4 && $monthRemain > 1){
                    $remainingDays = 'in '.$monthRemain.' month(s).';
                }
            }
            if($monthRemain <= 1 && $monthRemain >= 0){
                $WeekRemain = date('W',strtotime($date)) - date('W',strtotime(date('Y-m-d'))) ;
                // if($WeekRemain < 2){
                //     $dayRemain = (int)$day - (int)date('d');
                //     if($dayRemain > 0){
                //         $remainingDays = 'in '.$dayRemain.' day(s).';
                //     }else if($dayRemain == 0){
                //         $remainingDays = ' today.';
                //     }
                // }else{
                    $remainingDays = 'in '.$WeekRemain.' week(s).';
                // }
            }
        }

        return $remainingDays;
        
    }
    public static function DocumentExpiry(){
        $data = [];
        $ExpireExt = DB::table('extension_application')->select('expiry_date')->where('student_id',Auth::user()->id)->where('application_status','approved')->get();
        $ExpireKpp = DB::table('kpps_application')->select('expiry_date')->where('student_id',Auth::user()->id)->where('application_status','approved')->get();
        $ExpirePassport = DB::table('student_details')->select('passport_expire_date')->where('student_id',Auth::user()->id)->limit(1)->get()[0]->passport_expire_date;
        
        if($ExpirePassport){
            $remainingTime = self::CountRemainingTime('passport',$ExpirePassport);
            if($remainingTime){
                array_push($data,'Your Passport will expire '.$remainingTime);
            }
        }
        foreach($ExpireExt as $val){
            $remainingTime = self::CountRemainingTime('ext',$val->expiry_date);
            if($remainingTime){
                array_push($data,'Your Extension Visa will expire '.$remainingTime);
            }
        }
        foreach($ExpireKpp as $val){

            $remainingTime = self::CountRemainingTime('kpp',$val->expiry_date);
            if($remainingTime){
                array_push($data,'Your Student Visa will expire '.$remainingTime);
            }
        }
        return $data;
    }
    public function GetuserDetails(Request $request){
        $id = $request->user()->id; 
        $fetcher=[];
        if($id){
            $user =  DB::table('users')->select('surname','other_names','email')->where('id',$id)->limit(1)->get();
            $userDetails =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
            array_push($fetcher, array_merge((array)$user[0],(array)$userDetails[0]));
        }
        return $fetcher[0];
    }
    
    public function userDetailsFetcher(Request $request){
        $id = $request->user()->id; 
        $fetcher =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
        return $fetcher[0];
    }
    public static function FetchKppView( Request $req){
        $id = $req->user()->id; 
        $user =  DB::table('users')->select('surname','other_names','email')->where('id',$id)->limit(1)->get();
        $userDetails =  DB::table('student_view_data')->where('student_id',$id)->limit(1)->get();
        $kppApp = DB::table('kpps_application')->where('student_id',$id)->get();
        
        $data = [];
        array_push($data,array_merge((array)$user[0],(array)$userDetails[0]));
        if(sizeOf($kppApp) > 0){
            // array_push($data,$kppApp);
            // return $data;
            return $kppApp;
        }
        return [];
    }
    public static function FetchExtensionAppView( Request $req){
        $id = $req->user()->id; 
        $user =  DB::table('users')->select('surname','other_names','email')->where('id',$id)->limit(1)->get();
        $userDetails =  DB::table('student_view_data')->where('student_id',$id)->limit(1)->get();
        $extApp = DB::table('extension_application')->where('student_id',$id)->get();
        
        $data = [];
        array_push($data,array_merge((array)$user[0],(array)$userDetails[0]));
        if(sizeOf($extApp) > 0){
            // array_push($data,$kppApp);
            // return $data;
            return $extApp;
        }
        return [];
    }

    

    public function Create_Newstudentpass(request $request){
        $id = $request->user()->id; 
       
        // $validator = validator()->make(request()->all(), [
        //     'passportPICTURE' => 'required|mimes:png,jpg,jpeg,pdf',
        //     'biodataPAGE' => 'mimes:png,jpg,jpeg,pdf',
        //     'currentVISA' => 'mimes:png,jpg,jpeg,pdf',
        //     'guardiansID' => 'mimes:png,jpg,jpeg,pdf',
        //     'commitmentLETTER' => 'mimes:png,jpg,jpeg,pdf',
        //     'academicTRANSCRIPTS' => 'mimes:png,jpg,jpeg,pdf',
        //     'policeCLEARANCE' => 'mimes:png,jpg,jpeg,pdf'
        // ]);
        
        // if ($validator->fails())
        // {
        //     redirect()->back()->with('error', ['your message here']);
        // }
        if($request->hasFile('passportPICTURE','biodataPAGE','biodataPAGE','currentVISA','guardiansID','commitmentLETTER'
        ,'academicTRANSCRIPTS','policeCLEARANCE'))
        {

            
            $this->validate($request,[
            'entry_date' => 'required|date',
            'passportPICTURE' => 'required|mimes:png,jpg,jpeg,pdf',
            'biodataPAGE' => 'required|mimes:png,jpg,jpeg,pdf',
            'currentVISA' => 'required|mimes:png,jpg,jpeg,pdf',
            'guardiansID' => 'required|mimes:png,jpg,jpeg,pdf',
            'commitmentLETTER' => 'required|mimes:png,jpg,jpeg,pdf',
            'academicTRANSCRIPTS' => 'required|mimes:png,jpg,jpeg,pdf',
            'policeCLEARANCE' => 'required|mimes:png,jpg,jpeg,pdf'
            ]
            );

            $appId = rand(1000,1000000);
                
            if(sizeOf(DB::table('kpps_application')->where('id',$appId)->get()) > 0){
                Create_Newvisaextension($request);
            }else{
                $on_going_request = DB::select('select * from kpps_application where student_id ='.Auth::user()->id.' and (application_status = "pending" or application_status = "in progress") LIMIT 1');
                
                if(sizeOf($on_going_request) > 0){
                    return back()->with('kpp_request_ongoing','Student pass application with ID No "'.$on_going_request[0]->id.'" has a status of "'.$on_going_request[0]->application_status.'". We cannot initiate a new application.');
                }
                else{
                    $path_pp=$request->file('passportPICTURE');
                    $path_bd=$request->file('biodataPAGE');
                    $path_cv=$request->file('currentVISA');
                    $path_gid=$request->file('guardiansID');
                    $path_cL=$request->file('commitmentLETTER');
                    $path_AT=$request->file('academicTRANSCRIPTS');
                    $path_PC=$request->file('policeCLEARANCE');
        
                    // $allowedFileTypes = config('app.allowedFieTypes');
                    // $maxFileSize = config('app.maxFileSize');
                    // $rules = [
                    //          'file' => 'required|mimes:'.$allowedFileTypes.'|max'.$maxFileSize 
                    // ];
                    
                    // $this->validate( $request,$rules);
        
                    $passportPic = FileUploader::fileupload($request,'passportPICTURE','PassportPhoto','kpps/');
                    $passportBio = FileUploader::fileupload($request,'biodataPAGE','PassportBioData','kpps/');
                    $currentV = FileUploader::fileupload($request,'currentVISA','CurrentVisa','kpps/');
                    $guardianId = FileUploader::fileupload($request,'guardiansID','GuardianBio','kpps/');
                    $commitmentL = FileUploader::fileupload($request,'commitmentLETTER','CommitmentLetter','kpps/');
                    $academicTrans = FileUploader::fileupload($request,'academicTRANSCRIPTS','AcademicTranscript','kpps/');
                    $policeCl = FileUploader::fileupload($request,'policeCLEARANCE','PoliceClearance','kpps/');
                    
        
                    $post = new applykpp();

                    $post->id = $appId;
                    $post->student_id = Auth::user()->id;
                    $post->date_of_entry = $request->entry_date;
                    $post->passport_picture = $passportPic;
                    $post->passport_biodata = $passportBio;
                    $post->current_visa = $currentV;
                    $post->guardian_biodata = $guardianId;
                    $post->commitment_letter = $commitmentL;
                    $post->accademic_transcript = $academicTrans;
                    $post->police_clearance = $policeCl;
                    $post->application_date = $this->CurrentDate();
                    $post->application_status = 'pending';

                    $post->timestamps = false;
        
                    $post->save();
                    return back()->with('kpp_request_added','Your student pass application Request has been submitted successfully');
                }
            }
            
        }        
        return back()->with('kpp_request_fail','All fields are required to proceed!');
       
       

    }
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
    public function Create_Newvisaextension(request $request){

        if($request->hasFile('entryVISA','Biodata','visaPAGE'))
        {
            $this->validate($request,[
                'entryVISA' => 'mimes:png,jpg,jpeg,pdf',
                'Biodata' => 'mimes:png,jpg,jpeg,pdf',
                'currentVISA' => 'mimes:png,jpg,jpeg,pdf'
            ]
            );

            
            // $allowedFileTypes = config('app.allowedFieTypes');
            // $maxFileSize = config('app.maxFileSize');
            // $rules = [
                //          'file' => 'required|mimes:'.$allowedFileTypes.'|max'.$maxFileSize 
                // ];
                
                // $this->validate( $request,$rules);
            $appId = rand(1000,1000000);
            
            if(sizeOf(DB::table('extension_application')->where('id',$appId)->get()) > 0){
                Create_Newvisaextension($request);
            }else{
                $on_going_request = DB::select('select * from extension_application where student_id ='.Auth::user()->id.' and (application_status = "pending" or application_status = "in progress") LIMIT 1');
                if(sizeOf($on_going_request) > 0){
                    return back()->with('visa_request_ongoing','An extension request with ID No "'.$on_going_request[0]->id.'" has a status of "'.$on_going_request[0]->application_status.'". We cannot initiate a new application.');
                }else{
                    $passportBio = FileUploader::fileupload($request,'Biodata','PassportBioData_'.$appId,'extension/');
                    $entryV = FileUploader::fileupload($request,'entryVISA','entryPage_'.$appId,'extension/');
                    $currentV = FileUploader::fileupload($request,'currentVISA','CurrentVisa_'.$appId,'extension/');
        
                    $post = new applyvisaextension();
                    
                    $post->id = $appId;
                    $post->student_id = Auth::user()->id;
                    $post->passport_biodata = $passportBio;
                    $post->entry_visa = $entryV;
                    $post->current_visa = $currentV;
                    $post->date_of_entry = '2023-03-19';
                    $post->application_date = '2023-03-16';
                    $post->application_status = 'pending';
        
        
                    $post->timestamps = false;
                    $post->save();
            
                    return back()->with('visa_request_added','Your visa extension request has been submitted successfully');
                }
            }
        }
    }

        /* Update Kpp Application */
    // public function AvailabilityGetter(){
    //     $availability = MySchedule::select('user_id','my_schedule')->get();
    //     return $availability;
    // }

    public function updateKPP(request $req , $id){

        $data = applykpp::find($req->id);

        if($req->hasFile('passportPICTURE','biodataPAGE','biodataPAGE','currentVISA','guardiansID','commitmentLETTER'
        ,'academicTRANSCRIPTS','policeCLEARANCE')) 
        {
            $path_pp= 'storage/kpps/'. $data->passportPICTURE ;
            $path_bd= 'storage/kpps/'. $data->biodataPAGE;
            $path_cv='storage/kpps/'.$data->currentVISA;
            $path_gid='storage/kpps/'.$data->guardiansID;
            $path_cL='storage/kpps/'.$data->commitmentLETTER;
            $path_AT='storage/kpps/'.$data->academicTRANSCRIPTS;
            $path_PC='storage/kpps/'.$data->policeCLEARANCE;

            if(File::exists($path_pp,$path_bd,$path_cv,$path_gid,$path_cL,$path_AT,$path_PC)){
                File::delete($path_pp,$path_bd,$path_cv,$path_gid,$path_cL,$path_AT,$path_PC);
        }
        $data->surNAME = $req->surNAME;
        $data->otherNAMES = $req->otherNAMES;
        $data->passportNUMBER = $req->passportNUMBER;
        $data->suID = $req->suID;
        $data->Course = $req->Course;
        $data->Residence = $req->Residence;
        $data->suEMAIL = $req->suEMAIL;
        $data->Nationality = $req->Nationality;
        $data->dateofENTRY = $req->dateofENTRY;
        $data->phoneNUMBER = $req->phoneNUMBER;
        $data->Faculty = $req->Faculty;

        $path_pp=$req->file('passportPICTURE');
        $path_bd=$req->file('biodataPAGE');
        $path_cv=$req->file('currentVISA');
        $path_gid=$req->file('guardiansID');
        $path_cL=$req->file('commitmentLETTER');
        $path_AT=$req->file('academicTRANSCRIPTS');
        $path_PC=$req->file('policeCLEARANCE');

        $extension1 = $path_pp -> getClientOriginalName();
        $extension2 = $path_bd -> getClientOriginalName();
        $extension3 = $path_cv -> getClientOriginalName();
        $extension4 = $path_gid -> getClientOriginalName();
        $extension5 = $path_cL -> getClientOriginalName();
        $extension6 = $path_AT -> getClientOriginalName();
        $extension7 = $path_PC -> getClientOriginalName();


        $filename1 = time().'.'.$extension1;
        $filename2 = time().'.'.$extension2;
        $filename3 = time().'.'.$extension3;
        $filename4 = time().'.'.$extension4;
        $filename5 = time().'.'.$extension5;
        $filename6 = time().'.'.$extension6;
        $filename7 = time().'.'.$extension7;


        $path_pp->move('storage/kpps/',$filename1);
        $path_bd->move('storage/kpps/',$filename2);
        $path_cv->move('storage/kpps/',$filename3);
        $path_PC->move('storage/kpps/',$filename4);
        $path_AT->move('storage/kpps/',$filename5);
        $path_cL->move('storage/kpps/',$filename6);
        $path_gid->move('storage/kpps/',$filename7);

        $data->passportPICTURE = $filename1;
        $data->biodataPAGE = $filename2;
        $data->currentVISA = $filename3;
        $data->guardiansID = $filename4;
        $data->commitmentLETTER = $filename5;
        $data->academicTRANSCRIPTS = $filename6;
        $data->policeCLEARANCE = $filename7;
        $data->update();
        return redirect('/MykppApplications')->with('kpp_updated_successfully','Record Updated successfully');
         }
    }

    // public function getCountries(){
    //     $get_data= CountryController::readFile();
    //     $country = array();
    //     foreach($get_data as $key => $data){
    //         if($key > 0){
    //             array_push($country , $data[0]);
    //         }
    //     }
    //     return $country;
    // }
    

    /* Update Visa Application */
    public function PDFFileView($path,$file ){
        $thisFile= $file;   
        // $thisFile= Crypt::decrypt($file);   

         return view('Layouts/PdfView', ['file'=>$path.'/'.$thisFile]);
    }
    public function NewVISAAPPEDIT($id ){
        $dataID= Crypt::decrypt($id);   

        $data= applyvisaextension::find($dataID);
         return view('Layouts/studentActions/visaapplicationedit', compact('data'));
    }

    
    public function Newstudentpass(Request $request){
        return view('Layouts/studentActions/RequestNewKPP',['getCountries'=>RegisteredUserController::getCountries(),'getUserDetails'=>$this->userDetailsFetcher($request),'user'=>$this->GetuserDetails($request), 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }
    
    //BUDDIES MANAGEMENT SECTION//
    
    public function BuddyProgram(request $request){
        $id = $request->user()->id;        
        $data=[];
        $is_buddy=false;
        $AllAssigned=[];
        $IsABubby = DB::table("user_roles")->where('user_id',$id)->where('role','buddy')->get();

        $myallocation=[];

        $BuddyId = DB::table("buddies_allocations")->select('id as allocation_id','buddy_id','request_id','request_change')->where('student_id',$id)->limit(1)->get();
        if(sizeOf($BuddyId) > 0){
            $BuddyUser = DB::table("users")->select('surname','other_names','email')->where('id',$BuddyId[0]->buddy_id)->limit(1)->get();
            $BuddyDetails = DB::table("student_details")->select('phone_number')->where('student_id',$BuddyId[0]->buddy_id)->limit(1)->get();
            array_push($myallocation,array_merge((array)$BuddyUser[0],(array)$BuddyId[0],(array)$BuddyDetails[0]));
        }
        
        if(sizeOf($IsABubby) < 1){
            $BuddyReq = DB::table("buddy_request")->where('student_id',$id)->get();
            if(sizeOf($BuddyReq) > 0){
                foreach($BuddyReq as $Breq){
                    array_push($data,(array) $Breq);
                }
            }
        }else {
            $is_buddy=true;
            $All = DB::table("buddies_allocations")->where('buddy_id',$id)->get();
            foreach ($All as $value) {
                $UserAssigned = DB::table("users")->select('surname','other_names','email')->where('id',$value->student_id)->limit(1)->get();
                $UserAssignedDetails = DB::table("student_details")->where('student_id',$value->student_id)->limit(1)->get();
                array_push($AllAssigned,array_merge((array)$UserAssigned[0],(array)$UserAssignedDetails[0]));
            }
        }

        return view('Layouts/studentActions/Buddyprogram',['RequestsData'=>$data,'allAllocated'=>$AllAssigned,'is_buddy'=>$is_buddy,'user'=>$this->GetuserDetails($request),'allocationGetter'=>$myallocation, 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }

    public function requestBuddyChange(request $request){
        $code = substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,mt_rand( 0 ,50 ) ,2 ) .substr( md5( time() ), 1,15);
        $checkRequest = DB::table("buddies_allocations")->where('request_id',$request->request_id)->get();

        if($checkRequest[0]->request_change === null){
            $data = DB::table("buddies_allocations")->where('request_id',$request->request_id)->update(['request_change'=>$code]);
            if($data){ return back()->with('request_change_success','Request placed successfully!'); }
            else{ return back()->with('request_change_fail','Failed to place a change request.  Try later!'); }
        }else{
            return back()->with('request_change_fail','Failed to place a new change request. One is still pending!');
        }
    }
    public function MyBuddyRequest(request $request){
        $id = $request->user()->id;      
        $data = DB::table("buddy_request")->where('student_id','=',$id)->where('status','pending')-limit(1)->get();
        return view('Layouts/studentActions/RequestedBuddies', ['data'=>$data[0], 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }

    public function newBuddyRequest(request $request){
        $id = $request->user()->id;        
        $data = DB::table("student_details")->where('student_id',$id)->limit(1)->get();
        
        // return back()->with('request_success','Your request was successful');
        return view('Layouts/studentActions/RequestABuddy',['user'=>$data[0], 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
        // return view('Layouts/studentActions/RequestABuddy',['user'=>$data[0]]);
    }

    public function PushBuddyRq($id){
        $post = new Request_Buddy();
        $post->buddy_request_id = rand(1000,1000000);
        $post->student_id = $id;
        $post->status = 'pending';
        $post->request_date = $this->CurrentDate();

        $post->timestamps = false;

        $post->save();
        return true;
    }

    public function RequestABuddy(Request $request){

        $id = $request->user()->id;             
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();
        $status = true;
        
        if(sizeOf($data) < 1){
            if($this->PushBuddyRq($id)){
                return back()->with('New_request_assigned','Request submitted Successfully');
            }
        }else{
            foreach ($data as $value) {
                if(strtolower($value->status) === 'pending'){
                    $status = false;
                    return back()->with('New_request_failed','Your Request for a buddy is already in Progress! Please be patient');
                }
                if(strtolower($value->status) === 'approved'){
                    $status = false;
                    return back()->with('New_request_failed','You have already been assigned a buddy! We cannot initiate new request.');
                }
            }
            if($status){
                if($this->PushBuddyRq($id)){
                    return back()->with('New_request_assigned','Request submitted Successfully');
                }
            }
        }
    }

    public function deleteFiles($files){
        if(File::delete($files)){
            return true;
        }else{
            return false;
        }
    }
    
    public function cancelExtApp(Request $request){
        $id = $request->user()->id; 
        $FileDlt = DB::table("extension_application")->where('student_id',$id)->where('application_status','pending')->limit(1)->get();
        $files = [public_path('Storage/extension/'.$FileDlt[0]->passport_biodata),public_path('Storage/extension/'.$FileDlt[0]->entry_visa),public_path('Storage/extension/'.$FileDlt[0]->current_visa)];
        if($this->deleteFiles($files)){
            $KppAppCancel = DB::table("extension_application")->where('student_id',$id)->where('application_status','pending')->delete();
            if($KppAppCancel){
                return back()->with('extApp_cancel_success','You have canceled your student pass request successfully. You can not re-activate your request, place a new request when needed.');
            }
        }
        return back()->with('extApp_cancel_fail','We couldn\'t cancel your request at the moment, try later.');
    }
    public function cancelKppApp(Request $request){
        $id = $request->user()->id; 
        $FileDlt = DB::table("kpps_application")->where('student_id',$id)->where('application_status','pending')->limit(1)->get();
        $files = [public_path('Storage/kpps/'.$FileDlt[0]->passport_biodata),public_path('Storage/kpps/'.$FileDlt[0]->passport_picture),public_path('Storage/kpps/'.$FileDlt[0]->current_visa),public_path('Storage/kpps/'.$FileDlt[0]->guardian_biodata),public_path('Storage/kpps/'.$FileDlt[0]->commitment_letter),public_path('Storage/kpps/'.$FileDlt[0]->accademic_transcript),public_path('Storage/kpps/'.$FileDlt[0]->police_clearance)];
        if($this->deleteFiles($files)){
            $KppAppCancel = DB::table("kpps_application")->where('student_id',$id)->where('application_status','pending')->delete();
            if($KppAppCancel){
                return back()->with('kppApp_cancel_success','You have canceled your student pass request successfully. You can not re-activate your request, place a new request when needed.');
            }
        }
        return back()->with('kppApp_cancel_fail','We couldn\'t cancel your request at the moment, try later.');
    }
    public function cancelBuddy(Request $request){
        $id = $request->bd_rq_id; 
        $BuddyCancel = DB::table("buddy_request")->where('buddy_request_id',$id)->update(['status'=>'cancel']);

        if($BuddyCancel){
            return back()->with('buddy_cancel_success','You have canceled your buddy request successfully. You can not re-activate your request, place a new request when needed.');
        }
        return back()->with('buddy_cancel_fail','We couldn\'t cancel your request at the moment, try later.');
    }
    public function MyBuddyAllocation(Request $request){
        $id = $request->user()->id;        
        $data=[];

        $BuddyId = DB::table("buddies_allocations")->select('id as allocation_id','buddy_id')->where('student_id',$id)->limit(1)->get();
        if(sizeOf($BuddyId) > 0){
            $BuddyUser = DB::table("users")->select('surname','other_names','email')->where('id',$BuddyId[0]->buddy_id)->limit(1)->get();
            // $BuddyDetails = DB::table("student_details")->select('phone_number')->where('student_id',$BuddyId[0]->buddy_id)->limit(1)->get();
            array_push($data,array_merge((array)$BuddyUser[0],(array)$BuddyId[0]));
        }

        return view('Layouts/studentActions/AllocatedBuddies',['allocationGetter'=>$data, 'availability'=>$this->AvailabilityGetter(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }

    

    //END OF BUDDY MANAGEMENT SECTION//
   
    
    // public function downloadVisaFile(Request $request, $file){   
                
    //     return response()->download(public_path('Storage/visaExtensionfiles/'.$file));    
    // }
    public function downloadGuides($file){    
        $file_path = storage_path().'/Guides'.'/'.$file;
        if (file_exists($file_path)){
            return Response::download($file_path, $file, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else{
            return back()->with('download_fail','Requested file does not exist on our server!'.$file_path);
        }   
    }
    public function downloadKpps(Request $request,$file){    
        $file_path = public_path('Storage/kpps/'. $file);
        if (file_exists($file_path)){
            return Response::download($file_path, $file, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else{
            return back()->with('download_fail','Requested file does not exist on our server!');
        }   
    }
    public function downloadExtensions(Request $request,$file){    
        $file_path = public_path('Storage/extension/'. $file);
        if (file_exists($file_path)){
            return Response::download($file_path, $file, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else{
            return back()->with('download_fail','Requested file does not exist on our server!');
        }   
    }

    public function VisaFirstOpen(Request $request){
        $id = Auth::user()->id;        
        $appId = $request->id;        
        $table = $request->table;        
        $UpdateTable = DB::table($table)->where('student_id',$id)->where('id',$appId)->update(['first_open'=>null]);
        if($UpdateTable){return true;}else{return false;}
        // return Response::send($appId.'->'.$table.'->'.$id);
        // return $table;
    }
    public function NewVisaextension(Request $request){
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id',$id)->get();
        
        return view('Layouts/studentActions/RequestNewVisa',['userData'=>$userData[0],'data'=>$ext,'getCountries'=>RegisteredUserController::getCountries(),'user'=>$this->GetuserDetails($request), 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }
    public function visaExtensions(Request $request){
        $id = $request->user()->id;        
        $userDetails = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();
        $userData=[];

        $fecthData =$this->FetchExtensionAppView($request);
        return view('Layouts/studentActions/studentvisaapplications',['userDetails'=>$userDetails[0],'data'=>$ext,'getDataView'=>$fecthData,'user'=>$this->GetuserDetails($request), 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }
    public function Listofkpps(Request $request){  
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $data = DB::table("kpps_application")->where('student_id','=',$id)->get();
        $fecthData =$this->FetchKppView($request);
        return view('Layouts/studentActions/studentkppapplications',['data'=>$data,'userDetails'=>$userData[0],'getDataView'=>$fecthData,'user'=>$this->GetuserDetails($request), 'availability'=>$this->AvailabilityGetter(),'NoBooking'=>$this->GetAllbookedMeeting(),'NoExt'=>$this->NotOpenedExt(),'NoKpps'=>$this->NotOpenedKpps()]);
    }
    public function issuedKpp(){
        return view('Layouts/studentActions/IssuedKpp');
    }
    public function BuddyRequest(){
        return view('auth/BuddyRequest');
    }

    public function NewSignup(){
        return view('auth/signup',['Guides'=>RegisteredUserController::Guides(),'countries'=>RegisteredUserController::getCountries(),'courses'=>RegisteredUserController::getCourses(),'faculties'=>RegisteredUserController::getFaculties()]);
    
    }

    public function GetAllbookedMeeting(){
        $data = BookingList::where('student_id',Auth::user()->id)->where('status','pending')->get();
        
        return $data;
    }
    public function bookMeeting(Request $req){
        $data = [str_replace('_','-',$req->selected_date_data),$req->time_selected];

        // echo json_encode($data);
        if(sizeOf(BookingList::where('student_id',Auth::user()->id)->where('status','pending')->get()) < 1){
            $post = new BookingList();

            $tm = date("Y-m-d h:i",strtotime($data[0].' '.$data[1]));
    
            // $post->admin_id = '66753';
            // $post->admin_id = $value[0];
            $post->student_id = Auth::user()->id;
            $post->booked_date_time = $tm;
            // $post->booked_date_time = json_encode($data);
            $post->status = 'pending';
            // $post->requested_at = date("Y-m-d h:i:s");
    
            $post->timestamps = false;
    
            if($post->save()){
                return back()->with('booking-success','You have successfully placed an appointment');
            }else{
                return back()->with('booking-error','Your Appointment could\'nt be placed at the moment. Try later ');
            }
        }else{
            return back()->with('booking-error','You have already placed an Appointment kindly be patient.');
        }

    }

    public function AddNewSignup(Request $request){

        if($request->filled('id','surNAME','otherNAMES','gender','email','phoneNUMBER','Faculty','Course','Nationality','passport_number','Residence')){
            $this->validate($request,[
                'id'=>'required|max:8',
                'surNAME'=>'required',
                'otherNAMES'=>'required',
                'gender'=>'required',
                'email'=>'required|email',
                'phoneNUMBER'=>'required|min:10',
                'Faculty'=>'required',
                'Course'=>'required',
                'Nationality'=>'required',
                'passport_number'=>'required',
                'passport_expire'=>'required',
                'Residence'=>'required'

                ]
            );

            if($request->notApplicable === 'Applicable'){
                $this->validate($request,[
                    'ParentNames'=>'required',
                    'ParentEmail'=>'required',
                    'ParentPhone'=>'required'
                    ]
                );
            }
            

            $CheckId = DB::table("users")->where('id',$request->id)->get();
            $CheckEmail = DB::table("users")->where('email',$request->email)->get();
            $CheckPassport = DB::table("student_details")->where('passport_number',$request->passport_number)->get();
            $status=0;

            if(sizeOf($CheckId) > 0 || sizeOf($CheckEmail) > 0 || sizeOf($CheckPassport) > 0){
                return back()->with('New_Student_failed','User with the same data found. Try again');
            }else{
                $CheckRole=[];
                if($request->user()){
                    $CheckRole = DB::table("user_roles")->select('role')->where('user_id',$request->user()->id)->limit(1)->get();
                }
                         
                $post = new addNewStudent();
                $postDetails = new addStudentDetails();
                $postGuardian = new studentGuardian();
                $postVerification = new userVerification();
                $postRole = new Role();
                if(sizeOf($CheckRole) >0){
                    if($request->status === 'active' || $CheckRole[0]->role === 'admin' || $CheckRole[0]->role === 'super_admin'){ $status = 1;}
                }
    
                $post->id = $request->id;
                $post->surname = $request->surNAME;
                $post->other_names = $request->otherNAMES;
                $post->gender = $request->gender;
                $post->email = $request->email;
                $post->password = Hash::make('123456');
                $post->status = $status;
    
                $postDetails->student_id = $request->id;
                $postDetails->phone_number = $request->phoneNUMBER;
                $postDetails->faculty = $request->Faculty;
                $postDetails->course = $request->Course;
                $postDetails->nationality = $request->Nationality;
                $postDetails->passport_number = strtoupper($request->passport_number);
                $postDetails->passport_expire_date = $request->passport_expire;
                $postDetails->passport_image = 'passport.jpg';
                $postDetails->residence = $request->Residence;
    
    
                if($request->notApplicable === 'Applicable'){
                    $postGuardian->student_id = $request->id;
                    $postGuardian->full_name = $request->ParentNames;
                    $postGuardian->email = $request->ParentEmail;
                    $postGuardian->phone_number = $request->ParentPhone;
                    $postGuardian->status = 'primary';
                }else{
                    $postGuardian->student_id = $request->id;
                    $postGuardian->full_name = 'Not Applicable';
                    $postGuardian->email ='Not Applicable';
                    $postGuardian->phone_number = 'Not Applicable';
                    $postGuardian->status = 'notApplicable';
                }
                
    
                $postVerification->user_id = $request->id;
                $postVerification->status = $status;
                $postVerification->verified_at = $this->CurrentDate();
                $postVerification->remember_token = "";
                $postVerification->created_at = $this->CurrentDate();
                $postVerification->last_update = $this->CurrentDate();
    
                $postRole->user_id = $request->id;
                $postRole->role = 'student';
    
                $post->timestamps = false;
                $postDetails->timestamps = false;
                $postGuardian->timestamps = false;
                $postVerification->timestamps = false;
                $postRole->timestamps = false;
    
                
                $post->save();
                $postDetails->save();
                $postGuardian->save();
                $postVerification->save();
                $postRole->save();
                if(sizeOf($CheckRole) > 0){
                    if($CheckRole[0]->role === 'admin' || $CheckRole[0]->role === 'super_admin'){
                        $msg='
                        Your account has successfully been created. Click on the link below to access the system.
                        Insert login Link.
                        Username : Email or Student ID
                        Default Password: 123456
                        Please remember to change your password to improve your account security.
                        ';
                        return redirect()->route('emailsend',[$request->email,$msg]);
                    }
                }else{
                    $msg='Your account has successfully been created but not yet activated. Do not attempt to login.
                    Please contact the system administrator for assistance.';
                    return back()->with('New_Student_Added','Your account has been added Successfully');
                }
            }
        }else{
            return back()->with('New_Student_failed','some feilds are missing!');
        }

    }

}
