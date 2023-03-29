<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\File;
use App\Http\Controllers\Auth;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FileUploader;
// use Auth;
use App\Models\addNewStudent;
use App\Models\addStudentDetails;
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
    public function userDetailsFetcher(Request $request){
        $id = $request->user()->id; 
        $fetcher =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
        return $fetcher[0];
    }
    public function FetchKppView( Request $req){
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
    public function FetchExtensionAppView( Request $req){
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
    public function updateVISA( request $req ){

        $data = applyvisaextension::find($req->id);

        if($req->hasFile('passportPIC','Biodata','currentVISA','entryVISA')) 
        {
            $path_pp = 'storage/visaExtensionfiles/'. $data->passportPIC;
            $path_bd = 'storage/visaExtensionfiles/'. $data->passportBIO;
            $path_cv = 'storage/visaExtensionfiles/'.$data->currentVISA;
            $path_ev = 'storage/visaExtensionfiles/'.$data->entryVISA;

            if(File::exists($path_pp,$path_bd,$path_cv,$path_ev)){
               File::delete($path_pp,$path_bd,$path_cv,$path_ev);
        }

        $data->surNAME = $req->surNAME;
        $data->otherNAMES = $req->otherNAMES;
        $data->passportNUMBER = $req->passportNUMBER;
        $data->suID = $req->suID;
        $data->suEMAIL = $req->suEMAIL;
        $data->Nationality = $req->Nationality;
        $data->dateofENTRY = $req->dateofENTRY;
       

        $path_pp=$req->file('passportPIC');
        $path_bd=$req->file('Biodata');
        $path_cv=$req->file('currentVISA');
        $path_ev=$req->file('entryVISA');
        

        $extension1 = $path_pp -> getClientOriginalName();
        $extension2 = $path_bd -> getClientOriginalName();
        $extension3 = $path_cv -> getClientOriginalName();
        $extension4 = $path_ev -> getClientOriginalName();

        $filename1 = time().'.'.$extension1;
        $filename2 = time().'.'.$extension2;
        $filename3 = time().'.'.$extension3;
        $filename4 = time().'.'.$extension4;
      

        $path_pp->move('storage/visaExtensionfiles/',$filename1);
        $path_bd->move('storage/visaExtensionfiles/',$filename2);
        $path_cv->move('storage/visaExtensionfiles/',$filename3);
        $path_ev->move('storage/visaExtensionfiles/',$filename4);
      

        $data->passportPIC = $filename1;
        $data->Biodata = $filename2;
        $data->currentVISA = $filename3;
        $data->entryVISA = $filename4;
        $data->update();
        return redirect ('/MyvisaextApplications')->with('visa_updated_successfully', 'Record Updated Successfully');
    
    }
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
            'dateofENTRY' => 'required|date',
            'passportPICTURE' => 'required|mimes:png,jpg,jpeg,pdf',
            'biodataPAGE' => 'required|mimes:png,jpg,jpeg,pdf',
            'currentVISA' => 'required|mimes:png,jpg,jpeg,pdf',
            'guardiansID' => 'required|mimes:png,jpg,jpeg,pdf',
            'commitmentLETTER' => 'required|mimes:png,jpg,jpeg,pdf',
            'academicTRANSCRIPTS' => 'required|mimes:png,jpg,jpeg,pdf',
            'policeCLEARANCE' => 'required|mimes:png,jpg,jpeg,pdf'
            ]
            );

            $on_going_request = DB::table('kpps_application')->where("student_id",$id)->limit(1)->get();
            if(sizeOf($on_going_request) > 0){
                if($on_going_request[0]->application_status === 'pending' || $on_going_request[0]->application_status === 'in progress' ){
                    return back()->with('kpp_request_ongoing','Student pass application with ID No "'.$on_going_request[0]->id.'" has a status of "'.$on_going_request[0]->application_status.'". We cannot initiate a new application.');
                }else{
                    $appId = rand(1000,1000000);

                    if(sizeOf(DB::table('kpps_application')->where('id',$appId)->get()) > 0){
                        Create_Newstudentpass($request);
                    }else{
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
                        $post->student_id = $request->suID;
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
            else{
                $appId = rand(1000,1000000);
                if(sizeOf(DB::table('kpps_application')->where('id',$appId)->get()) > 0){
                    Create_Newstudentpass($request);
                }else{
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
                    $post->student_id = $request->suID;
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
                $passportBio = FileUploader::fileupload($request,'Biodata','PassportBioData_'.$appId,'extension/');
                $entryV = FileUploader::fileupload($request,'entryVISA','entryPage_'.$appId,'extension/');
                $currentV = FileUploader::fileupload($request,'currentVISA','CurrentVisa_'.$appId,'extension/');
    
                $post = new applyvisaextension();
                
                $post->id = $appId;
                $post->student_id = $request->suID;
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

        /* Update Kpp Application */

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
    

    /* Update Visa Application */
    public function NewVISAAPPEDIT($id ){
        $dataID= Crypt::decrypt($id);   

        $data= applyvisaextension::find($dataID);
         return view('Layouts/studentActions/visaapplicationedit', compact('data'));
    }

    
    public function Newstudentpass(Request $request){
        return view('Layouts/studentActions/RequestNewKPP')->with('getCountries',$this->getCountries())->with('getUserDetails',$this->userDetailsFetcher($request));
    }
    
    //BUDDIES MANAGEMENT SECTION//
    public function BuddyProgram(request $request){
        $id = $request->user()->id;        
        $data=[];
        $is_buddy=false;
        $AllAssigned=[];
        $IsABubby = DB::table("user_roles")->where('user_id',$id)->where('role','buddy')->get();
        
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

        return view('Layouts/studentActions/Buddyprogram',['RequestsData'=>$data,'allAllocated'=>$AllAssigned,'is_buddy'=>$is_buddy]);
    }
    public function MyBuddyRequest(request $request){
        $id = $request->user()->id;      
        $data = DB::table("buddy_request")->where('student_id','=',$id)->where('status','pending')-limit(1)->get();
        return view('Layouts/studentActions/RequestedBuddies', ['data'=>$data[0]]);
    }

    public function newBuddyRequest(request $request){
        $id = $request->user()->id;        
        $data = DB::table("student_details")->where('student_id',$id)->limit(1)->get();
        
        return view('Layouts/studentActions/RequestABuddy',['user'=>$data[0]]);
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
                return redirect('/RequestBuddy')->with('Buddy_request_successful','Request submitted Successfully');
            }
        }else{
            foreach ($data as $value) {
                if(strtolower($value->status) === 'pending'){
                    $status = false;
                    return back()->with('New_request_failed','Your Request for a buddy is already in Progress! Please be patient');
                }
                if(strtolower($value->status) === 'approved'){
                    $status = false;
                    return back()->with('New_request_assigned','You have already been assigned a buddy! We cannot initiate new request.');
                }
            }
            if($status){
                if($this->PushBuddyRq($id)){
                    return redirect('/RequestBuddy')->with('Buddy_request_successful','Request submitted Successfully');
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
    public function cancelBuddy(Request $request,$id){
        // $id = $request->user()->id; 
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

        return view('Layouts/studentActions/AllocatedBuddies',['allocationGetter'=>$data]);
    }

    

    //END OF BUDDY MANAGEMENT SECTION//
    public function NewKPPAPPVIEW(Request $request){
        $id = $request->user()->id;    
        $userData = DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
        $data = DB::table('kpps_application')->where('student_id','=',$id)->limit(1)->get();
        return view('Layouts/studentActions/kppapplicationVIEW')->with('application',$data[0])->with('data',$userData[0]);
    }
    public function NewKPPAPPEDIT($id ){
        $dataID= Crypt::decrypt($id);     
        
        $data= applykpp::find($dataID);       
         return view('Layouts/studentActions/kppapplicationedit', compact('data'));
    }
    
    // public function downloadVisaFile(Request $request, $file){   
                
    //     return response()->download(public_path('Storage/visaExtensionfiles/'.$file));    
    // }
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

    public function NewVisaextension(Request $request){
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();

        return view('Layouts/studentActions/RequestNewVisa')->with('userData',$userData[0])->with('data',$ext)->with('getCountries',$this->getCountries());
    }
    public function visaExtensions(Request $request){
        $id = $request->user()->id;        
        $userDetails = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();
        $userData=[];
        // array_push($userData,array_merge((array)$,(array)$))

        $fecthData =$this->FetchExtensionAppView($request);
        return view('Layouts/studentActions/studentvisaapplications')->with('userDetails',$userDetails[0])->with('data',$ext)->with('getDataView',$fecthData);
    }
    public function Listofkpps(Request $request){  
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $data = DB::table("kpps_application")->where('student_id','=',$id)->get();
        $fecthData =$this->FetchKppView($request);
        return view('Layouts/studentActions/studentkppapplications',['data'=>$data,'userDetails'=>$userData[0],'getDataView'=>$fecthData]);
    }
    public function issuedKpp(){
        return view('Layouts/studentActions/IssuedKpp');
    }
    public function BuddyRequest(){
        return view('auth/BuddyRequest');
    }

    public function NewSignup(){
        return view('auth/signup',['countries'=>$this->getCountries()]);
    
    }

    public function AddNewSignup(Request $request){

        if($request->filled('suID','surNAME','firstNAME','lastNAME','suEMAIL','phoneNUMBER','Faculty','Course','Nationality','passportNUMBER','Residence','ParentNames','ParentEmail','ParentPhone'))
        {
            $this->validate($request,[
                'suID'=>'required|max:6',
                'surNAME'=>'required',
                'firstNAME'=>'required',
                'lastNAME'=>'required',
                'suEMAIL'=>'required|email',
                'phoneNUMBER'=>'required|min:10',
                'Faculty'=>'required',
                'Course'=>'required',
                'Nationality'=>'required',
                'passportNUMBER'=>'required',
                'Residence'=>'required',
                'ParentNames'=>'required',
                'ParentEmail'=>'required',
                'ParentPhone'=>'required'

                ]
            );
            $id = $request->suID;        
            $CheckRole = DB::table("user_roles")->select('role')->where('user_id',$request->user()->id)->limit(1)->get();
            $CheckPassport = DB::table("student_details")->where('passport_number',$request->passportNUMBER)->get();
            $data = DB::select("select * from users WHERE id= $id ");
            $status = 0;

            if(sizeOf($data) <1 && sizeOf($CheckPassport) <1){        
                $post = new addNewStudent();
                $postDetails = new addStudentDetails();
                $postGuardian = new studentGuardian();
                $postVerification = new userVerification();
                $postRole = new Role();

                if($request->status === 'active' || $CheckRole[0]->role === 'admin' || $CheckRole[0]->role === 'super_admin'){ $status = 1;}

                $post->id = $request->suID;
                $post->surname = $request->surNAME;
                $post->other_names = $request->firstNAME.' '.$request->lastNAME;
                $post->email = $request->suEMAIL;
                $post->password = Hash::make('123456');
                $post->status = $status;

                $postDetails->student_id = $request->suID;
                $postDetails->phone_number = $request->phoneNUMBER;
                $postDetails->faculty = $request->Faculty;
                $postDetails->course = $request->Course;
                $postDetails->nationality = $request->Nationality;
                $postDetails->passport_number = $request->passportNUMBER;
                $postDetails->passport_expire_date = '2023-03-10';
                $postDetails->passport_image = 'passport.jpg';
                $postDetails->residence = $request->Residence;


                $postGuardian->student_id = $request->suID;
                $postGuardian->full_name = $request->ParentNames;
                $postGuardian->email = $request->ParentEmail;
                $postGuardian->phone_number = $request->ParentPhone;
                $postGuardian->status = 'primary';


                

                $postVerification->user_id = $request->suID;
                $postVerification->status = $status;
                $postVerification->verified_at = $this->CurrentDate();
                $postVerification->remember_token = "";
                $postVerification->created_at = $this->CurrentDate();
                $postVerification->last_update = $this->CurrentDate();

                $postRole->user_id = $request->suID;
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
                return back()->with('New_Student_Added','New International Student data has been added Successfully');
            }else{
                return back()->with('New_Student_failed','A student with Same Admission No | Passport No is already Registered, please write to studentpass@strathmore.edu for assistance!');
            }
        }else{
            return back()->with('New_Student_failed','some feilds are missing!');
        }

    }

}
