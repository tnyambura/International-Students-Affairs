<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FileUploader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\addNewStudent;
use App\Models\Request_Buddy;
use App\Models\FetchBuddyRequests;
use App\Models\FetchBuddies;
use App\Models\FetchCountries;
use App\Models\User;
use App\Models\Role;
use App\Models\MySchedule;
use App\Models\buddies_allocation;
use App\Models\AllocateBuddyModel;
use App\Models\addNewBuddy;
use App\Models\applyKpp;
use App\Models\applyvisaextension;
use App\Models\BookingList;
use Dompdf\Dompdf;
use Dompdf\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\VisaExport;
use PDF;
use DB;





class adminactions extends Controller
{
    public static function GenderCount(){
        $NMale = 0; $NFemale=0;
        $allStdTb = DB::table("users")->get();
        foreach ($allStdTb as $value) {
            $GetUsersRole = DB::table('user_roles')->where('user_id',$value->id)->limit(1)->get();
            if($GetUsersRole[0]->role === 'student' && $value->gender === 'm' ){ $NMale = $NMale+1; }
            if($GetUsersRole[0]->role === 'student' && $value->gender === 'f' ){ $NFemale = $NFemale+1; }
        }
        return [$NMale,$NFemale];
    }
    public static function BdCount(){
        $sizeData= DB::table('buddy_request')->where('status','pending')->get();
        return sizeOf($sizeData);
    }
    public static function newVisaNotify(){
        $newVisaReq = 0;
        $KppStatistics= DB::table('kpps_application')->where('application_status','pending')->get();
        $ExtStatistics= DB::table('extension_application')->where('application_status','pending')->get();
        if(sizeOf($KppStatistics) > 0 || sizeOf($ExtStatistics) > 0){
            foreach($KppStatistics as $k){
                if($k->application_status === 'pending'){ $newVisaReq = $newVisaReq+1; }
            }
            foreach($ExtStatistics as $e){
                if($e->application_status === 'pending'){ $newVisaReq = $newVisaReq+1; }
            }
        }
        return $newVisaReq;
    }
    public function GetUserRole(){
        $userID= Auth::user()->id;
        $data = DB::table("user_roles")->where('user_id','=',$userID)->limit(1)->get();
        
        return $data[0]->role;
    }
    public function KppsUserData($applicationId){
        $data = DB::table("kpps_application")->where('id','=',$applicationId)->limit(1)->get();
        $userData = DB::table("student_details")->where('student_id','=',$data[0]->student_id)->limit(1)->get();
        
        return [$data,$userData];
    }
    public function NewKPPAPPVIEW(Request $request,$id){     
        return view('Layouts/AdminActions/kppapplicationView', ['data'=>$this->KppsUserData($id)[0][0]], ['userData'=>$this->KppsUserData($id)[1][0]]);
    }
    public function NewVISAAPPVIEW($id){       
        $data = DB::table("extension_application")->where('id','=',$id)->limit(1)->get();
        $userData = DB::table("student_details")->where('student_id','=',$data[0]->student_id)->limit(1)->get();
        
        return view('Layouts/AdminActions/visaapplicationView',['visarequests'=>$data[0]], ['userData'=>$userData[0]]);
    }
    public function changeStatus(Request $request, $id){
        $id = $request->id;
        $Initiate = applyvisaextension::find($id);
        
        if($Initiate){       
        $Initiate->status = 'In Progress';
        $Initiate->save();
        return back()->with('');

        }else{       
            return back()->with('Inprogress','The Application is already in progress');   
        }
        
    }
    public function deleteFiles($files){
        if(File::delete($files)){
            return true;
        }else{
            return false;
        }
    }      
    public function ExtensionStatusUpdate(Request $request){
         
        $fileUpload = null;
        if($request->fileResponse){
            $fileUpload = FileUploader::fileupload($request,'fileResponse','ExtensionDoc'.$request->app_id,'extension/');
        }

        $updateStatus = DB::table('extension_application')->where('id', $request->app_id)->update(['application_status'=>$request->status_select, 'uploads'=>$fileUpload, 'expiry_date'=>$request->expiry_date, 'first_open'=>'new approved']); 
        $msg = 'Your Visa extention application is '.$request->status_select;
        if($updateStatus){
            return redirect()->route('emailsend',[$request->applicant_email,$msg]);
        }
        return back()->with('error','could not update data');
    }
    public function KppsStatusUpdate(Request $request){
        $fileUpload = null;
        if($request->fileResponse){
            $fileUpload = FileUploader::fileupload($request,'fileResponse','StudentPassDoc'.$request->app_id,'kpps/');
        }
        $updateStatus = DB::table('kpps_application')->where('id', $request->app_id)->update(['application_status'=>$request->status_select, 'uploads'=>$fileUpload, 'expiry_date'=>$request->expiry_date, 'first_open'=>'new approved']); 
        $msg = 'Your Student Pass application is '.$request->status_select;
        if($updateStatus){
            return redirect()->route('emailsend',[$request->applicant_email,$msg]);
            // return back()->with('success','success');
        }
        return back()->with('error','could not update data ->'.$request->fileResponse.' -> '.$request->applicant_email.' -> '.$request->app_id);
    }
    public function download(Request $request, $file){   
    
        $path = 'storage/kpps/'.$file;

            if(storage::exists($path)){
                return response()->download('storage/kpps/'.$file);
            }else{
                return back()->with('No_File','File Not Found');
            }

    }
    public function visadownload(Request $request, $file){   

        $path = 'storage/visaExtensionfiles/'.$file;

        if(storage::exists($path)){

       return response()->download('storage/visaExtensionfiles/'.$file);
        }else{

            return back()->with('No_File','File Not Found');
        }
        
    }
    public function editStaffData(Request $r){
        
        // $UpdateUsersDetails = DB::table('student_details')->where('student_id',$r->cr_id)->update(['phone_number'=>$r->phone, 'residence'=>$r->residence, 'faculty'=>$r->faculty, 'course'=>$r->course, 'nationality'=>$r->country, 'passport_number'=>$r->passNo, 'passport_expire_date'=>$r->passEx]);
        // $UpdateUsers = DB::table('users')->where('id',$r->cr_id)->update(['id'=>$r->u_id,'surname'=>$r->sname, 'other_names'=>$r->oname, 'email'=>$r->email]);

        $mesg = 'Not pushed yet ';
        // if($UpdateUsers || $UpdateUsersDetails){
        //     $mesg .= 'user tables successfully!';
        //     return back()->with('user_update_success',$mesg);
        // }else{
        //     $mesg .= 'could not be save. try later';
        // }
        return back()->with('user_update_failed',$mesg);
        
    }
    public function editMyProfile(Request $r){
        $mesg = 'Update made successfully! ';
        $userData = ['id'=>$r->u_id,'surname'=>$r->sname, 'other_names'=>$r->oname, 'email'=>$r->email];
        $UpdateUsersDetails=[];
        $getCurrentPass = DB::table('users')->select('password')->where('id',$r->cr_id)->limit(1)->get()[0]->password;
   
        if($r->is_change_active !== "false"){

            if(!Hash::check($r->old_pass, $getCurrentPass)){
                $mesg = 'Old Password do not match!';
                return back()->with('user_update_failed',$mesg);
            }

            if($r->new_pass !== $r->conf_pass){
                $mesg = 'Password do not match!';
                return back()->with('user_update_failed',$mesg);
            }else{
                if(Hash::check($r->new_pass, $getCurrentPass)){
                    $mesg = 'The new password cannot match the old. Try again!';
                    return back()->with('user_update_failed',$mesg);
                }else{
                    $userData = ['id'=>$r->u_id,'surname'=>$r->sname, 'other_names'=>$r->oname, 'email'=>$r->email, 'password'=>Hash::make($r->new_pass)];
                }
            }
        }
        if(sizeOf(DB::table('student_details')->where('student_id',$r->cr_id)->get()) > 0){
            $UpdateUsersDetails = DB::table('student_details')->where('student_id',$r->cr_id)->update(['phone_number'=>$r->phone, 'residence'=>$r->residence, 'faculty'=>$r->faculty, 'course'=>$r->course, 'nationality'=>$r->country, 'passport_number'=>$r->passNo, 'passport_expire_date'=>$r->passEx]);
        }
        $UpdateUsers = DB::table('users')->where('id',$r->cr_id)->update($userData);

        
        if($UpdateUsers || $UpdateUsersDetails){
            $mesg .= ' Data has been modified!';
            return back()->with('user_update_success',$mesg);
        }else{
            $mesg = 'Modification could not be saved. Try later';
            return back()->with('user_update_failed',$mesg);
        }
    }
    public function editUserData(Request $r){
        $mesg = 'Update made successfully';
        $userData = ['id'=>$r->u_id,'surname'=>$r->sname, 'other_names'=>$r->oname, 'email'=>$r->email];

        $UpdateUsersDetails = DB::table('student_details')->where('student_id',$r->cr_id)->update(['phone_number'=>$r->phone, 'residence'=>$r->residence, 'faculty'=>$r->faculty, 'course'=>$r->course, 'nationality'=>$r->country, 'passport_number'=>$r->passNo, 'passport_expire_date'=>$r->passEx]);
        $UpdateUsers = DB::table('users')->where('id',$r->cr_id)->update($userData);

        
        if($UpdateUsers || $UpdateUsersDetails){
            $mesg .= 'user tables successfully!';
            return back()->with('user_update_success',$mesg);
        }else{
            $mesg .= 'could not be save. try later';
            return back()->with('user_update_failed',$mesg);
        }
        
    }
    public function activate_user(Request $request){
        $statusSet=0;
        $Message='deactivate';
        $msg='Your account has temporarily been deactivated. Please reach out to the administrator via studentpass@strathmore.edu for assistance with reactivation. ';
        if(strtolower($request->action) === 'activate'){
            $statusSet = 1;
            $Message='activate';
            $msg='Your account has been activated successfully. 
            Your default password is 123456. Kindly log in and reset the password. ';
        }
        $activateUser = DB::table('users')->where('id', $request->user_id)->update(['status'=>$statusSet]);
        if($activateUser){
            // 
            return redirect()->route('emailsend',[$request->email,$msg]);
            // return back();
        }else{
            return back()->with('activation_failed','We couldn\'t '.$Message.' this account at the moment. Try later!'  );
        }

    }
    public function applicationsResponse(){

    }

    public function getallusers(Request $req){
        $id = $req->user()->id;
        $data=[];
        $MyRole = DB::table('user_roles')->select('role')->where('user_id',$id)->limit(1)->get();
        $GetUsers = DB::table('users')->select('id as user_id','surname','other_names','gender','email','status')->get();
        $GetUsersRole = DB::table('user_roles')->get();
        
        if($MyRole[0]->role === 'super_admin'){
            foreach ($GetUsers as $value) {
                if($value->user_id !== $id){
                    $thisUser=[];
                    $isBuddy=false;
                    $GetUsersRole = DB::table('user_roles')->where('user_id',$value->user_id)->limit(1)->get();
                    $isBuddyChecker = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','buddy')->get();
                    if(sizeOf($isBuddyChecker) > 0 ){ $isBuddy = true; }
                    if(sizeOf($GetUsersRole) > 0 ){
                        $GetUsersDetails = DB::table('student_details')->where('student_id',$value->user_id)->limit(1)->get();
                        if(sizeOf($GetUsersDetails) > 0){
                            // if($GetUsersRole[0]->role === 'student'){
                                array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                                // }
                        }else{
                            array_push($data,array_merge((array)$value,['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));

                        }
                    }
                }
            }
        }
        if($MyRole[0]->role === 'admin'){
            foreach ($GetUsers as $value) {
                if($value->user_id !== $id){
                    $thisUser=[];
                    $isBuddy=false;
                    $GetUsersRole = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','student')->limit(1)->get();
                    $isBuddyChecker = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','buddy')->get();
                    if(sizeOf($isBuddyChecker) > 0 ){ $isBuddy = true; }
                    if(sizeOf($GetUsersRole) > 0 ){
                        $GetUsersDetails = DB::table('student_details')->where('student_id',$value->user_id)->limit(1)->get();
                        if(sizeOf($GetUsersDetails) > 0){
                            array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                        }
                    }
                }
            }
        }
        return view('Layouts/AdminActions/ListofAllUsers',['newVisaReq'=>adminactions::newVisaNotify(),'BdCountReq'=>$this->BdCount(),'users'=>$data, 'NumMale'=>$this->GenderCount()[0], 'NumFemale'=>$this->GenderCount()[1]]);
    }
    public function getallAllBuddiesReport(){

        $pdf = PDF::setOptions(['isPhpEnabled' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true])->LoadView('Layouts/AdminActions/buddiesListReport',['buddies'=>$this->BuddiesFecher(),'img'=>public_path('logo.png')]);
        return $pdf->download('All_Buddies_'.date("Y-m-d").'.pdf');
        // return view('Layouts/AdminActions/buddiesListReport',['buddies'=>$this->BuddiesFecher(),'img'=>public_path('logo.png')]);
    }
    public function getallAllocationsReport(){

        $tableGetter = DB::table('buddies_allocations')->get();
        $data = [];
        
        foreach ($tableGetter as $value) {
            $student = DB::table('student_view_data')->select('student_id','surname','other_names','email','phone_number')->where('student_id',$value->student_id)->limit(1)->get()[0];
            $buddy = DB::table('student_view_data')->select('student_id as bd_id','surname as bd_srnm','other_names as bd_onm','email as bd_eml','phone_number as bd_phn')->where('student_id',$value->buddy_id)->limit(1)->get()[0];
            
            array_push($data,array_merge((array)$student,(array)$buddy));
        }
        $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/allAllocationsReport',['allocations'=>$data]);
        return $pdf->download('Buddy-allocation-list_'.date("Y-m-d").'.pdf');
        // return view(,['allocations'=>$data]);
    }

    public function getallusersReport(Request $req){
        $id = $req->user()->id;
        $data=[];
        $MyRole = DB::table('user_roles')->select('role')->where('user_id',$id)->limit(1)->get();
        $GetUsers = DB::table('users')->select('id as user_id','surname','other_names','email','status')->get();
        $GetUsersRole = DB::table('user_roles')->get();
            foreach ($GetUsers as $value) {
                if($value->user_id !== $id){
                    $thisUser=[];
                    $isBuddy=false;
                    $GetUsersRole = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','student')->limit(1)->get();
                    $isBuddyChecker = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','buddy')->get();
                    if(sizeOf($isBuddyChecker) > 0 ){ $isBuddy = true; }
                    if(sizeOf($GetUsersRole) > 0 ){
                        $GetUsersDetails = DB::table('student_details')->where('student_id',$value->user_id)->limit(1)->get();
                        if(sizeOf($GetUsersDetails) > 0){
                            array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                        }
                    }
                }
            }
        // }
        return view('Layouts/AdminActions/allUsersReport',['users'=>$data]);
    }
    public function getVisaData($table,$status){
        $tableGetter = DB::table($table)->where('application_status',$status)->get();
        $applicationStatus = [];
        $data = [];
        if(sizeOf($tableGetter) > 0){
            foreach ($tableGetter as $application) {
                $fetchUser = DB::table('users')->where('id','=',$application->student_id)->limit(1)->get();
                $fetched = DB::table('student_details')->where('student_id','=',$application->student_id)->limit(1)->get();
                array_push($applicationStatus,$application->application_status);
                $uData = array_merge((array)$fetched[0],(array)$fetchUser[0]);
                array_push($data,array_merge((array)$uData,(array)$application));
            }
        }
        return $data;
    }
    public function getAllkppApplications(){
            // $data= applyKpp::all('id','otherNAMES','passportNUMBER','updated_at','biodataPAGE','currentVISA','policeCLEARANCE','dateofENTRY','Nationality','created_at');
            $kppsDb = DB::table('kpps_application')->where('application_status','pending')->get();
            $extDb = DB::table('extension_application')->where('application_status','pending')->get();
            $data=[];
            
            $applicationStatus=[['pending','in progress','declined','approved']];
            $ext_data=[];
            $ext_applicationStatus=[['pending','in progress','declined','approved']];
            
            foreach ($kppsDb as $application) {
                $fetchUser = DB::table('users')->where('id','=',$application->student_id)->limit(1)->get();
                $fetched = DB::table('student_details')->where('student_id','=',$application->student_id)->limit(1)->get();
                array_push($applicationStatus,$application->application_status);
                $uData = array_merge((array)$fetched[0],(array)$fetchUser[0]);
                array_push($data,array_merge((array)$uData,(array)$application));
            }
            
            foreach ($extDb as $application) {
                $fetchUser = DB::table('users')->where('id','=',$application->student_id)->limit(1)->get();
                $fetched = DB::table('student_details')->where('student_id','=',$application->student_id)->limit(1)->get();
                array_push($ext_applicationStatus,$application->application_status);
                $uData = array_merge((array)$fetched[0],(array)$fetchUser[0]);
                array_push($ext_data,array_merge((array)$uData,(array)$application));
            }
        //    return view('Layouts/AdminActions/Listofvisaextensionrequests',['visarequests'=>$data],['applicationStatus'=>$applicationStatus]);
            
            return view('Layouts/AdminActions/listofkppsapplications',
            ['newVisaReq'=>adminactions::newVisaNotify(),'BdCountReq'=>$this->BdCount(),'data'=>$data,'applicationStatus'=>$applicationStatus,'visarequests'=>$ext_data,'ext_applicationStatus'=>$ext_applicationStatus,'extApproved'=>$this->getVisaData('extension_application','approved'),'extProgress'=>$this->getVisaData('extension_application','in progress'),'extDeclined'=>$this->getVisaData('extension_application','declined'),'kppApproved'=>$this->getVisaData('kpps_application','approved'),'kppProgress'=>$this->getVisaData('kpps_application','in progress'),'kppDeclined'=>$this->getVisaData('kpps_application','declined')]);
    }
    public function BuddiesRequestFecher(){
        $u_request = DB::table('buddy_request')->select('student_id','buddy_request_id')->where('status','pending')->get();
        $data=[];
        
        foreach ($u_request as $u_r) {
            $usersDb = DB::table('users')->where('id',$u_r->student_id)->limit(1)->get();
            array_push($data,array_merge((array)$u_r,(array)$usersDb[0]));
        }
        return $data;
    }
    public function UsersFecher(){
        $allUsers = DB::table('users')->select('id','surname','other_names','email')->get();
        
        return $allUsers;
    }
    public function BuddiesFecher(){
        $roles = DB::table('user_roles')->select('user_id')->where('role','buddy')->get();
        $data=[];
        
        foreach ($roles as $user) {
            $usersDb = DB::table('users')->where('id',$user->user_id)->limit(1)->get();
                array_push($data,$usersDb[0]);
        }
        return $data;
    }
    public function AllocationsFecher(){
        $bdAllocations = DB::table('buddies_allocations')->get();
        $data=[];
        
        foreach ($bdAllocations as $allocation) {
            $StudentData = DB::table('users')->select('id','surname','other_names','email')->where('id',$allocation->student_id)->limit(1)->get();
            $buddyData = DB::table('users')->select('id as bd_id','surname as bd_srnm','other_names as bd_onm','email as bd_eml')->where('id',$allocation->buddy_id)->limit(1)->get();
                array_push($data,array_merge((array)$StudentData[0],(array)$buddyData[0],['req_id'=>$allocation->request_id,'change_req'=>$allocation->request_change]));
        }
        return $data;
    }
    public function ExcelExport(Request $req){
        $title = $req->title;
        $exportFrom = $req->from;
        // $title = 'List_of_Extension_Applications_'.date('Y');
        $exportDataFrom= new UsersExport;

        switch ($exportFrom) {
            case 'visa':
                $exportDataFrom= new VisaExport;
                break;
            case 'buddy':
                $exportDataFrom= new BuddyExport;
                break;
        }
        
        // 'List_of_kpps_Application_'.date('Y').
        return Excel::download( $exportDataFrom, $title.'.xlsx');
    }
    public function RegisterNewBuddy(Request $req){
            $postRole=new Role();

            $postRole->user_id = $req->user_id;
            $postRole->role = 'buddy';

            $postRole->timestamps = false;

            if(sizeOf(DB::table('buddies_allocations')->where('student_id',$req->user_id)->get()) > 0 || sizeOf(DB::table('buddy_request')->where('student_id',$req->user_id)->get()) > 0){

                $deleteAllocation = DB::table('buddies_allocations')->where('student_id',$req->user_id)->delete();
                $deleteRequest = DB::table('buddy_request')->where('student_id',$req->user_id)->delete();
                if($deleteAllocation || $deleteRequest){
                    $postRole->save();
                    return back()->with('Buddy_Register_success','Student successfully registered as buddy!');
                }else{
                    return back()->with('Buddy_Register_fail','We couldn\'t make this user a Buddy. Try later');
                }
            }else{
                $postRole->save();
                return back()->with('Buddy_Register_success','Student successfully registered as buddy!');
            }

    }
    public function RemoveAsBuddy(Request $req){
            $allAllocatedUsers = DB::table('buddies_allocations')->select('student_id')->where('buddy_id',$req->bd_id)->get();
            foreach ($allAllocatedUsers as $value) {
                if(DB::table('buddy_request')->where('status','approved')->where('student_id',$value->student_id)->update(['status'=>'pending'])){
                    DB::table('buddies_allocations')->where('student_id',$value->student_id)->where('buddy_id',$req->bd_id)->delete();
                }
            }
            if(DB::table('user_roles')->where('user_id',$req->bd_id)->where('role','buddy')->delete()){
                return back()->with('Buddy_Removed_success','User successfully removed as buddy!');
            }else{
                return back()->with('Buddy_Removed_fail','We couldn\'t remove the user as buddy. Try later!');
            }

    }
    public function dismissAllocation(Request $req){
            $deleteAllocation = DB::table('buddies_allocations')->where('student_id',$req->user)->delete();

            if($deleteAllocation){
                $deleteFromRequest = DB::table('buddy_request')->where('student_id',$req->user)->delete();
                if($deleteFromRequest){
                    return back()->with('dissmiss_student','Student dissmissed');
                }else{
                    return back()->with('dissmiss_student-fail','Couldn\'t dissmiss user');
                }
            }else{
                return back()->with('dissmiss_student-fail','Couldn\'t dissmiss user from allocation');
            }
    }
    public function AllocateBuddy(Request $req){ // new allocation
        
        $generatedId = rand(1000,1000000);
        // if($req->hasFile('studentId','buddy_id')){

            $this->validate($req,[
                'studentId'=>'required',
                'buddy_id'=>'required',
                ]
            );
            $post = new AllocateBuddyModel;
            
            $post->id = $generatedId;
            $post->request_id = $req->request_id;
            $post->student_id = $req->studentId;
            $post->buddy_id = $req->buddy_id;
            
            $post->timestamps = false;

            if($post->save()){
                return back()->with('Buddy_Allocation_success','Allocation successful!');
            }else{
                return back()->with('Buddy_Allocation_fail','Allocation failed! Try later.');
            }
            
            // $allocatedQuery = ;

            // if($post->save()){
            //     return back()->with('Buddy_Allocation_success','Allocation successful!');
        // }else{
        //     return back()->with('Buddy_Allocation_failed','Some fields are missing');
        // }
            
            
        // }
        
    }
    public function EditAllocatedBuddy(Request $req){ // new allocation
        
        $generatedId = rand(1000,1000000);

        $this->validate($req,[
            'student_id'=>'required',
            'buddy_id'=>'required',
            ]
        );
        if($req->change_req === 'normal'){
            DB::table('buddies_allocations')->where('student_id',$req->student_id)->update(['buddy_id'=>$req->buddy_id]);
        }
        if($req->change_req === 'ChangeRequested'){
            DB::table('buddies_allocations')->where('student_id',$req->student_id)->update(['buddy_id'=>$req->buddy_id, 'request_change'=>null]);
        }
        return back()->with('Buddy_modification_success','Allocation successful!');
            
            
        // }
        
    }
    public function getAllvisaextensionrequests(){
        $extDb = DB::table('extension_application')->get();
        $data=[];
        $applicationStatus=[['pending','in progress','declined','approved']];
        
        foreach ($extDb as $application) {
            $fetchUser = DB::table('users')->where('id','=',$application->student_id)->limit(1)->get();
            $fetched = DB::table('student_details')->where('student_id','=',$application->student_id)->limit(1)->get();
            array_push($applicationStatus,$application->application_status);
            $uData = array_merge((array)$fetched[0],(array)$fetchUser[0]);
            array_push($data,array_merge((array)$uData,(array)$application));
        }
       return view('Layouts/AdminActions/Listofvisaextensionrequests',['visarequests'=>$data],['applicationStatus'=>$applicationStatus]);
    }

    

    public function BuddiesManagement(){
        return view('Layouts/AdminActions/Buddies',['newVisaReq'=>$this->newVisaNotify(),'BdCountReq'=>$this->BdCount(),'buddies'=>$this->BuddiesFecher(),'BuddiesAllocations'=>$this->AllocationsFecher(),'allbuddies'=>$this->BuddiesFecher(),'stUsers'=>$this->UsersFecher(),'buddiesRequests'=>$this->BuddiesRequestFecher(),'buddies'=>$this->BuddiesFecher()]);
    }
    public function generateAllocatedBuddieslist(){
        $list = $this->BuddiesFecher();
        if(sizeOf($list) > 0){        
            $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/ListofBuddiesPDF',['data'=>$list]);  
            return $pdf->download('List_of_all_allocations.pdf'); 
        }else{
            return back()->with('data_not_available','There is no data available, kindly add the students to generate report');
        }   
                   
    }
    public function generateBuddieslist(){
        $list = $this->BuddiesFecher();
        if(sizeOf($list) > 0){        
            $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/ListofBuddiesPDF',['data'=>$list]);  
            return $pdf->download('Listofstudents.pdf'); 
        }else{
            return back()->with('data_not_available','There is no data available, kindly add the students to generate report');
        }   
                   
    }
    public function getAllApprovedVisaReport(){
        $loadView = 'Layouts/AdminActions/allApprovedVisaReport';
        $fileName = 'ApprovedVisaList_'.date("Y_m_d");
        
        $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView($loadView,['exVisas'=>$this->getVisaData('extension_application','approved'),'kppVisas'=>$this->getVisaData('kpps_application','approved')]);
        return $pdf->download($fileName.'.pdf');
        // return view($loadView,['exVisas'=>$this->getVisaData('extension_application','approved'),'kppVisas'=>$this->getVisaData('kpps_application','approved')]); 
    }
    public function getAllInProgressVisaReport(){
        $loadView = 'Layouts/AdminActions/allInProgressVisaReport';
        $fileName = 'In_ProgressVisaList_'.date("Y_m_d");
        
        $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView($loadView,['exVisas'=>$this->getVisaData('extension_application','in progress'),'kppVisas'=>$this->getVisaData('kpps_application','in progress')]);
        return $pdf->download($fileName.'.pdf');
        // return view($loadView,['exVisas'=>$this->getVisaData('extension_application','approved'),'kppVisas'=>$this->getVisaData('kpps_application','approved')]); 
    }
    public function getAllDeclinedVisaReport(){
        $loadView = 'Layouts/AdminActions/allDeclinedVisaReport';
        $fileName = 'DeclinedVisaList_'.date("Y_m_d");
        
        $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView($loadView,['exVisas'=>$this->getVisaData('extension_application','declined'),'kppVisas'=>$this->getVisaData('kpps_application','declined')]);
        return $pdf->download($fileName.'.pdf');
        // return view($loadView,['exVisas'=>$this->getVisaData('extension_application','approved'),'kppVisas'=>$this->getVisaData('kpps_application','approved')]); 
    }
    public function getAllStudentsReport(){
        $table = 'users';
        $cols = ['id as user_id','surname','other_names','email','status'];
        $loadView = 'Layouts/AdminActions/allUsersReport';
        $fileName = 'All_users_file';

        if(sizeOf($cols) > 0){
            $list = DB::table($table)->select($cols)->get();
        }else{
            $list = DB::table($table)->get();
        }
        $data =[];
        foreach ($list as $value) {
            // $GetUsersDetails = DB::table('student_details')->where('student_id',$value->student_id)->limit(1)->get();        
            // array_push($data,(array)$GetUsersDetails);
            $thisUser=[];
            $isBuddy=false;
            $GetUsersRole = DB::table('user_roles')->where('user_id',$value->user_id)->limit(1)->get();
            $isBuddyChecker = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','buddy')->get();
            if(sizeOf($isBuddyChecker) > 0 ){ $isBuddy = true; }
            if(sizeOf($GetUsersRole) > 0 ){
                $GetUsersDetails = DB::table('student_details')->where('student_id',$value->user_id)->limit(1)->get();
                if(sizeOf($GetUsersDetails) > 0){
                    // if($GetUsersRole[0]->role === 'student'){
                        array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                        // }
                }else{
                    array_push($data,array_merge((array)$value,['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));

                }
            }
        }
        $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView($loadView,['users'=>$data]);
        return $pdf->download($fileName.'.pdf');
        // return view($loadView,['users'=>$data]);
        // if(sizeOf($list) > 0){ 


        // }else{
        //     return back()->with('data_not_available','There is no data available to generate a report.');
        // }   
    }
    public function ExportToEXCEL($table,$cols,$loadView,$fileName){
        $list = DB::table($table)->select($cols)->get();
        if(sizeOf($list) > 0){         
            $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView($loadView,['students'=>$list]);
            return $pdf->download($fileName.'.pdf');
        }else{
            return back()->with('data_not_available','There is no data available to generate a report.');
        }   
        
    }

    public function GeneratePDF(Request $request){
        $function = $request->function;
        
        return $this->$function();
    }

    public function studentslistgenerateReport(){
        $data= addNewStudent::all('id','suID','suEMAIL','firstNAME','lastNAME','Course','Nationality');
        return view('Layouts/AdminActions/StudentsListPDF',['students'=>$data]);
        }
    public function deletestudentrecord($id){
        $dataID= Crypt::decrypt($id);   

        DB::table('add_new_students')->where('id', $dataID)->delete();        
        return back()->with('Record_deleted','Record has been Deleted Successfully');

    }

    public function getBuddyRequests(){

        return view('Layouts/AdminActions/listofBuddyRequests',['buddiesRequests'=>$this->BuddiesRequestFecher()],['buddies'=>$this->BuddiesFecher()]);
    }
    public function myScheduleView(){
        $t = MySchedule::select('my_schedule')->get();
        $bookingRequests = [];
        if(sizeOf($t) > 0){
            $t = $t[0]->my_schedule;
            $bookingRequests = DB::table('bookingList')->get();
        }
        return view('Layouts/AdminActions/MySchedule',['newVisaReq'=>$this->newVisaNotify(),'BdCountReq'=>$this->BdCount(),'schedule_list'=>json_decode($t),'bookingRequests'=>$bookingRequests]);
        
    }
    public function MeetingDone($id){
        $t = DB::table('bookingList')->where('id',$id)->update(['status'=>'met']);
        return back();
        
    }
    public function SaveMySchedule(Request $req){
        $post = new MySchedule();

        $checkSchedule = DB::table('scheduleTime')->where('user_id',Auth::user()->id)->get();
        
        if(sizeOf($checkSchedule) > 0){
            if(DB::table('scheduleTime')->where('user_id',Auth::user()->id)->update(['my_schedule'=>$req->selected_date_data]))
                return back()->with('success_schedule_save','Schedule Availability has been successfully updated.');

        }else{
            $post->user_id = Auth::user()->id;
            $post->month = 'may';
            $post->my_schedule = $req->selected_date_data;
    
            $post->timestamps=false;
    
            $post->save();
    
            return back()->with('success_schedule_save','Schedule Availability has been successfully saved.');
        }

    }
    
   
   public function StudentDetailsEdit($id){
    $dataID= Crypt::decrypt($id); 
    $data= addNewStudent::find($dataID);
    return view('Layouts/AdminActions/EditNewStudent', compact('data'));
        }

    public function StudentDetailsUpdate(request $req , $id){
        
        $data = addNewStudent::find($req->id);        
        
        $data->surNAME = $req->surNAME;
        $data->firstNAME = $req->firstNAME;
        $data->lastNAME = $req->lastNAME;
        $data->suID = $req->suID;
        $data->suEMAIL = $req->suEMAIL;
        $data->Faculty = $req->Faculty;
        $data->Nationality = $req->Nationality;
        $data->Course = $req->Course;
        $data->Residence = $req->Residence;
        $data->phoneNUMBER = $req->phoneNUMBER;
        $data->passportNUMBER = $req->passportNUMBER;

        $data->ParentEmail = $req->ParentEmail;
        $data->ParentPhone = $req->ParentPhone;
        $data->ParentNames = $req->ParentNames;

        $data->update();
        // return back()->with('Record_Updated','Record has been Updated Successfully');
        return redirect('/listofIS')->with('Record_Updated','Record has been Updated Successfully');        

    }

    public function getStatReport(){

        // $pdf = PDF::setOptions(['isPhpEnabled' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true])->LoadView('welcome',['buddies'=>$this->BuddiesFecher(),'img'=>public_path('logo.png')]);
        // return $pdf->download('sta'.date("Y-m-d").'.pdf');
        // return view('Layouts/AdminActions/buddiesListReport',['buddies'=>$this->BuddiesFecher(),'img'=>public_path('logo.png')]);
    }
       

}
