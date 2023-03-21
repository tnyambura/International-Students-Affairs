<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
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





class studentactions extends Controller
{

    
    public function CurrentDate(){
        date_default_timezone_set('africa/nairobi');
        $CurrentDate = date('Y-m-d H:i:s', time());

        return $CurrentDate;
    }
    public function userDetailsFetcher(Request $request){
        $id = $request->user()->id; 
        $fetcher =  DB::table('student_view_data')->select('id','surname','other_names','email')->where('student_id','=',$id)->limit(1)->get();
        return $fetcher[0];
    }
    public function FetchKppView( Request $req){
        $id = $req->session; 
        $user =  DB::table('users')->select('surname','other_names','email')->where('id','=',$id)->limit(1)->get();
        $userDetails =  DB::table('student_view_data')->where('student_id','=',$id)->limit(1)->get();
        $kppApp = DB::table('kpps_application')->where('id',10)->limit(1)->get();
        if(sizeOf($kppApp) > 0){
            $data = [];
            array_push($data,array_merge((array)$kppApp[0],(array)$userDetails[0],(array)$userDetails));
            return $data;
        }else{
            return [];
        }
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
        //     'passportPICTURE' => 'required|mimes:png,jpg,pdf',
        //     'biodataPAGE' => 'mimes:png,jpg,pdf',
        //     'currentVISA' => 'mimes:png,jpg,pdf',
        //     'guardiansID' => 'mimes:png,jpg,pdf',
        //     'commitmentLETTER' => 'mimes:png,jpg,pdf',
        //     'academicTRANSCRIPTS' => 'mimes:png,jpg,pdf',
        //     'policeCLEARANCE' => 'mimes:png,jpg,pdf'
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
            'passportPICTURE' => 'required|mimes:png,jpg,pdf',
            'biodataPAGE' => 'required|mimes:png,jpg,pdf',
            'currentVISA' => 'required|mimes:png,jpg,pdf',
            'guardiansID' => 'required|mimes:png,jpg,pdf',
            'commitmentLETTER' => 'required|mimes:png,jpg,pdf',
            'academicTRANSCRIPTS' => 'required|mimes:png,jpg,pdf',
            'policeCLEARANCE' => 'required|mimes:png,jpg,pdf'
            ]
            );

            $on_going_request = DB::table('kpps_application')->where("student_id",$id)->limit(1)->get();
            if(sizeOf($on_going_request) > 0){
                if($on_going_request[0]->application_status === 'pending' || $on_going_request[0]->application_status === 'in progress' ){
                    return back()->with('kpp_request_ongoing','Student pass application with ID No "'.$on_going_request[0]->id.'" has a status of "'.$on_going_request[0]->application_status.'". We cannot initiate a new application.');
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
        return back()->with('kpp_request_fail','All fields are required to proceed!');
       
       

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

    public function visaExtensions(request $request){
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();

        return view('Layouts/studentActions/studentvisaapplications')->with('userData',$userData[0])->with('data',$ext);

    }
    public function NewVisaAPPVIEW(Request $request){
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/VisaapplicationView')->with('userData',$userData[0])->with('data',$ext);
    }

    
    public function Newstudentpass(Request $request){
        return view('Layouts/studentActions/RequestNewKPP')->with('getCountries',$this->getCountries())->with('getUserDetails',$this->userDetailsFetcher($request));
    }
    
    //BUDDIES MANAGEMENT SECTION//
    public function BuddyProgram(request $request){
        $id = $request->user()->id;        
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/Buddyprogram', ['RequestsData'=>$data]);
    }
    public function MyBuddyRequest(request $request){
        $id = $request->user()->id;      
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/RequestedBuddies', compact('data'));
    }

    public function newBuddyRequest(request $request){
        $id = $request->user()->id;        
        $data = DB::table("student_details")->where('student_id',$id)->limit(1)->get();
        
        return view('Layouts/studentActions/RequestABuddy',['user'=>$data[0]]);
    }

    public function RequestABuddy(Request $request){

        $id = $request->user()->id;             
        $data = DB::table("buddy_request")->where('student_id','=',$id)->limit(1)->get();

        if(sizeOf($data) < 1){
            $post = new Request_Buddy();
            $post->id = rand(1000,1000000);
            $post->student_id = $id;
            $post->status = 'pending';
            $post->request_date = $this->CurrentDate();

            $post->timestamps = false;

            $post->save();
            return redirect('/RequestBuddy')
            ->with('Buddy_request_successful','Request submitted Successfully');
        }
        if(strtolower($data[0]->status) === 'pending'){
            return back()->with('New_request_failed','Your Request for a buddy is already in Progress! Please be patient');
        }
        if(strtolower($data[0]->status) !== 'pending'){
            return back()->with('New_request_assigned','You have already been assigned a buddy! We cannot initiate new request.');
        }
    }
    
    Public function cancelKppApp(Request $request){
        $id = $request->user()->id; 
        $KppAppCancel = DB::table("kpps_application")->where('student_id',$id)->delete();
        if($KppAppCancel){
            return back()->with('kppApp_cancel_success','You have canceled your student pass request successfully. You can not re-activate your request, place a new request when needed.');
        }
        return back()->with('kppApp_cancel_fail','We couldn\'t cancel your request at the moment, try later.');
    }
    Public function cancelBuddy(Request $request){
        $id = $request->user()->id; 
        $BuddyCancel = DB::table("buddy_request")->where('student_id',$id)->update(['status'=>'cancel']);
        if($BuddyCancel){
            return back()->with('buddy_cancel_success','You have canceled your buddy request successfully. You can not re-activate your request, place a new request when needed.');
        }
        return back()->with('buddy_cancel_fail','We couldn\'t cancel your request at the moment, try later.');
    }
    Public function MyBuddyAllocation(Request $request){
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
    
    Public Function downloadVisaFile(Request $request, $file){   
                
        return response()->download(public_path('Storage/visaExtensionfiles/'.$file));    
    }
    Public Function download(Request $request, $file){       
        return response()->download(public_path('Storage/kpps/'.$file));    
    }


    public function Create_Newvisaextension(request $request){

        if($request->hasFile('entryVISA','Biodata','visaPAGE'))
        {
            $this->validate($request,[
                'entryVISA' => 'mimes:png,jpg,pdf',
                'Biodata' => 'mimes:png,jpg,pdf',
                'currentVISA' => 'mimes:png,jpg,pdf'
            ]
        );

            // $allowedFileTypes = config('app.allowedFieTypes');
            // $maxFileSize = config('app.maxFileSize');
            // $rules = [
            //          'file' => 'required|mimes:'.$allowedFileTypes.'|max'.$maxFileSize 
            // ];
            
            // $this->validate( $request,$rules);

            $passportBio = FileUploader::fileupload($request,'Biodata','PassportBioData','extension/');
            $entryV = FileUploader::fileupload($request,'entryVISA','entryPage','extension/');
            $currentV = FileUploader::fileupload($request,'currentVISA','CurrentVisa','extension/');

            $post = new applyvisaextension();
            
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
    public function NewVisaextension(Request $request){
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $ext = DB::table("extension_application")->where('student_id','=',$id)->get();

        return view('Layouts/studentActions/RequestNewVisa')->with('userData',$userData[0])->with('data',$ext)->with('getCountries',$this->getCountries());
    }
    public function Listofkpps(Request $request){  
        $id = $request->user()->id;        
        $userData = DB::table("student_view_data")->where('student_id','=',$id)->limit(1)->get();
        $data = DB::table("kpps_application")->where('student_id','=',$id)->get();

        return view('Layouts/studentActions/studentkppapplications')->with('data',$data)->with('userDetails',$userData[0]);
    }
    public function issuedKpp(){
        return view('Layouts/studentActions/IssuedKpp');
    }
    public function BuddyRequest(){
        return view('auth/BuddyRequest');
    }

    public function NewSignup(){
        return view('auth/signup');
    
    }

    public function AddNewSignup(request $request){

        if($request->hasFile('suID','surNAME','firstNAME','lastNAME','suEMAIL','phoneNUMBER','Faculty','Course','Nationality','passportNUMBER','Residence','ParentNames','ParentEmail','ParentPhone'))
        {
            $request->validate($request,[
                'suID'=>'required',
                'surNAME'=>'required',
                'firstNAME'=>'required',
                'lastNAME'=>'required',
                'suEMAIL'=>'required|unique',
                'phoneNUMBER'=>'required',
                'Faculty'=>'required',
                'Course'=>'required',
                'Nationality'=>'required',
                'passportNUMBER'=>'required|unique',
                'Residence'=>'required',
                'ParentNames'=>'required',
                'ParentEmail'=>'required|unique',
                'ParentPhone'=>'required|unique'

                ]
            );
            $id = $request->suID;        
            $data = DB::select("select * from users WHERE id= $id ");

            if($data == false){        
                $post = new addNewStudent();
                $postDetails = new addStudentDetails();
                $postGuardian = new studentGuardian();
                $postVerification = new userVerification();
                $postRole = new Role();

                $post->id = $request->suID;
                $post->surname = $request->surNAME;
                $post->other_names = $request->firstNAME.' '.$request->lastNAME;
                $post->email = $request->suEMAIL;
                $post->password = Hash::make('123456');
                $post->status = 0;

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
                $postVerification->status = 0;
                $postVerification->verified_at = '2023-03-10 08:00:00';
                $postVerification->remember_token = "";
                $postVerification->created_at = '2023-03-10 08:00:00';
                $postVerification->last_update = '2023-03-10 08:00:00';

                $postRole->user_id = $request->suID;
                $postRole->role = 'student';

                $post->timestamps = false;
                $postDetails->timestamps = false;
                $postGuardian->timestamps = false;
                $postVerification->timestamps = false;
                $postRole->timestamps = false;
                // $post->suID = $request->suID;
                // $post->suEMAIL = $request->suEMAIL;
                // $post->surNAME = $request->surNAME;
                // $post->firstNAME = $request->firstNAME;
                // $post->lastNAME = $request->lastNAME;
                


                // $post->ParentEmail = $request->ParentEmail;
                // $post->ParentPhone = $request->ParentPhone;
                // $post->ParentNames = $request->ParentNames;


                
                $post->save();
                $postDetails->save();
                $postGuardian->save();
                $postVerification->save();
                $postRole->save();
                return back()->with('New_Student_Added','New International Student data has been added Successfully');
            }else{
                return back()->with('New_Student_failed','A student with Same Admission Number is already Registered, please write to studentpass@strathmore.edu for assistance!');
            }
        }

    }

}
