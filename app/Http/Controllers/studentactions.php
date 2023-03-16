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



class studentactions extends Controller
{

    
    public function updateVISA( request $req ){

        $data = applyvisaextension::find($req->id);

        if($req->hasFile('passportPIC','Biodata','currentVISA','entryVISA')) 
        {
            $path_pp = 'storage/visaExtensionfiles/'. $data->passportPIC;
            $path_bd = 'storage/visaExtensionfiles/'. $data->passportPIC;
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

       
        if($request->hasFile('passportPICTURE','biodataPAGE','biodataPAGE','currentVISA','guardiansID','commitmentLETTER'
        ,'academicTRANSCRIPTS','policeCLEARANCE'))
        {

            $this->validate($request,[
            'passportPICTURE' => 'required|mimes:png,jpg,pdf|max:2048',
            'biodataPAGE' => 'required|mimes:png,jpg,pdf|max:2048',
            'currentVISA' => 'required|mimes:png,jpg,pdf|max:2048',
            'guardiansID' => 'required|mimes:png,jpg,pdf|max:2048',
            'commitmentLETTER' => 'required|mimes:png,jpg,pdf|max:2048',
            'academicTRANSCRIPTS' => 'required|mimes:png,jpg,pdf|max:2048',
            'policeCLEARANCE' => 'required|mimes:png,jpg,pdf|max:2048'
        ]
        );

            $post = new applykpp();
            $post->suID = $request->suID;
            $post->suEMAIL = $request->suEMAIL;
            $post->surNAME = $request->surNAME;
            $post->otherNAMES = $request->otherNAMES;
            $post->passportNUMBER = $request->passportNUMBER;
            $post->Course = $request->Course;
            $post->Residence = $request->Residence;
            $post->Nationality = $request->Nationality;
            $post->dateofENTRY = $request->dateofENTRY;
            $post->phoneNUMBER = $request->phoneNUMBER;
            $post->Faculty = $request->Faculty;

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
            //          'file' => 'required|mimes:'.$allowedFileTypes'|max'.$maxFileSize 
            // ];
            
            // $this->validate( $request,$rules);

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


            $post->passportPICTURE = $filename1;
            $post->biodataPAGE = $filename2;
            $post->currentVISA = $filename3;
            $post->guardiansID = $filename4;
            $post->commitmentLETTER = $filename5;
            $post->academicTRANSCRIPTS = $filename6;
            $post->policeCLEARANCE = $filename7;
            $post->save();
            return back()->with('kpp_request_added','Your student pass application Request has been submitted successfully');
    
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

    public function visaExtensions(request $request){
        $id = $request->user()->suID;        
        $data = DB::table("extension_application")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/studentvisaapplications',compact('data'));

    }
    public function NewVisaAPPVIEW($id){
        $dataID= Crypt::decrypt($id);   

        $data= applyvisaextension::find($dataID);
        return view('Layouts/studentActions/VisaapplicationView', compact('data'));
    }

    
    public function Newstudentpass(){
        // $get_data= CountryController::readFile();
        // $country = array();
        // foreach($get_data as $key => $data){
        //     if($key > 0){
        //         array_push($country , $data[0]);
        //     }
        // }
        // $get_data= FetchCountries::get();
        // $data = array('get_data'=>$get_data);
        return view('Layouts/studentActions/RequestNewKPP')->with('getCountries',$this->getCountries());
    }
    
    //BUDDIES MANAGEMENT SECTION//
    public function BuddyProgram(request $request){
        $id = $request->user()->id;        
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/Buddyprogram', compact('data'));
    }
    public function MyBuddyRequest(request $request){
        $id = $request->user()->id;      
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();
        return view('Layouts/studentActions/RequestedBuddies', compact('data'));
    }

    public function newBuddyRequest(){
        return view('Layouts/studentActions/RequestABuddy')->with('get_data',$this->getCountries());
    }

    public function RequestABuddy(Request $request){

        $id = $request->user()->id;             
        $data = DB::table("buddy_request")->where('student_id','=',$id)->get();

        if(sizeOf($data) < 1){
            $post = new Request_Buddy();
            $post->id = 988257;
            $post->student_id = $id;
            $post->status = 'pending';
            $post->request_date = '2023-03-15';

            $post->timestamps = false;

            $post->save();
            return redirect('/RequestBuddy')
            ->with('Buddy_request_successful','Request submitted Successfully');
        }else{
            return back()->with('New_request_failed','Your Request for a buddy is already in Progress! Please be patient');
        }
    }

    Public function MyBuddyAllocation(Request $request){
        $id = $request->user()->suID;        
        $Buddies = DB::select("select * from buddies_allocations WHERE newSTD_suID= $id ");
        return view('Layouts/studentActions/AllocatedBuddies',['Buddies'=>$Buddies]);
    }

    //END OF BUDDY MANAGEMENT SECTION//
    public function NewKPPAPPVIEW($id){
        $dataID= Crypt::decrypt($id);     
        
        $data= applykpp::find($dataID);
        return view('Layouts/studentActions/kppapplicationVIEW', compact('data'));
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

        if($request->hasFile('passportPIC','entryVISA','Biodata','visaPAGE'))
        {
            $post = new applyvisaextension();
            $post->suEMAIL = $request->suEMAIL;
            $post->suID = $request->suID;
            $post->surNAME = $request->surNAME;
            $post->otherNAMES = $request->otherNAMES;
            $post->passportNUMBER = $request->passportNUMBER;
            $post->Nationality = $request->Nationality;
            $post->dateofENTRY = $request->dateofENTRY;
            

            $path_pp=$request->file('passportPIC');
            $path_ev=$request->file('entryVISA');
            $path_bd=$request->file('Biodata');
            $path_cv=$request->file('currentVISA');

            $extension_PP = $path_pp -> getClientOriginalName();
            $extension_BD = $path_bd -> getClientOriginalName();
            $extension_CV = $path_cv -> getClientOriginalName();
            $extension_EV = $path_ev -> getClientOriginalName();

            $filename_PP = time().'.'.$extension_PP;
            $filename_BD = time().'.'.$extension_BD;
            $filename_CV = time().'.'.$extension_CV;
            $filename_EV = time().'.'.$extension_EV;
        
            $path_pp->move('storage/visaExtensionfiles/',$filename_PP);
            $path_ev->move('storage/visaExtensionfiles/',$filename_BD);
            $path_bd->move('storage/visaExtensionfiles/',$filename_CV);
            $path_cv->move('storage/visaExtensionfiles/',$filename_EV);

            $post->passportPIC = $filename_PP;
            $post->Biodata = $filename_BD;
            $post->currentVISA = $filename_CV;
            $post->entryVISA = $filename_EV;
            

            $post->save();
            return back()->with('visa_request_added','Your visa extension request has been submitted successfully');

        }
    }
    public function NewVisaextension(){
        return view('Layouts/studentActions/RequestNewVisa')->with('get_data',$this->getCountries());
    }
    public function Listofkpps(Request $request){  
        $id = $request->user()->suID;        
        $data = DB::table("kpps_application")->where('student_id','=',$id)->get();

        return view('Layouts/studentActions/studentkppapplications',compact('data'));
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
            $postRole->role_id = 3;

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
