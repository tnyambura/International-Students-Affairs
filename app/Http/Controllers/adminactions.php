<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Auth;
use App\Http\Controllers\FileUploader;
use Illuminate\Support\Facades\Storage;
use App\Models\addNewStudent;
use App\Models\Request_Buddy;
use App\Models\FetchBuddyRequests;
use App\Models\FetchBuddies;
use App\Models\FetchCountries;
use App\Models\User;
use App\Models\Role;
use App\Models\buddies_allocation;
use App\Models\AllocateBuddyModel;
use App\Models\addNewBuddy;
use App\Models\applyKpp;
use App\Models\applyvisaextension;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use DB;





class adminactions extends Controller
{
    public function GetUserRole(Request $request){
        $userID= $request->user()->id;
        $data = DB::table("user_roles")->where('user_id','=',$userID)->limit(1)->get();
        
        return $data[0]->role;
    }
    public function KppsUserData($applicationId){
        $data = DB::table("kpps_application")->where('id','=',$applicationId)->limit(1)->get();
        $userData = DB::table("student_details")->where('student_id','=',$data[0]->student_id)->limit(1)->get();
        
        return [$data,$userData];
    }
    public function NewKPPAPPVIEW(Request $request,$id){
        // $userID= $request->user()->id;        
        return view('Layouts/AdminActions/kppapplicationView', ['data'=>$this->KppsUserData($id)[0][0]], ['userData'=>$this->KppsUserData($id)[1][0]]);
    }
    public function NewVISAAPPVIEW($id){       
        $data = DB::table("extension_application")->where('id','=',$id)->limit(1)->get();
        $userData = DB::table("student_details")->where('student_id','=',$data[0]->student_id)->limit(1)->get();
        
        return view('Layouts/AdminActions/visaapplicationView',['visarequests'=>$data[0]], ['userData'=>$userData[0]]);
    }

    public function changeStatus(Request $request, $id)
    {
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
    
    // public function cancelExtApp(Request $request){
    //     $id = $request->user()->id; 
    //     $FileDlt = DB::table("extension_application")->where('student_id',$id)->where('application_status','pending')->limit(1)->get();
    //     $files = [public_path('Storage/extension/'.$FileDlt[0]->passport_biodata),public_path('Storage/extension/'.$FileDlt[0]->entry_visa),public_path('Storage/extension/'.$FileDlt[0]->current_visa)];
    //     if($this->deleteFiles($files)){
            
    public function ExtensionStatusUpdate(Request $request){
         
        $fileUpload = null;
        if($request->fileResponse){
            $fileUpload = FileUploader::fileupload($request,'fileResponse','ExtensionDoc'.$request->app_id,'extension/');
        }

        $updateStatus = DB::table('extension_application')->where('id', $request->app_id)->update(['application_status'=>$request->status_select, 'uploads'=>$fileUpload]); 
        $msg = 'Your Visa extention application is '.$request->status_select;
        if($updateStatus){
            return redirect()->route('emailsend',[$request->applicant_email,$msg]);
        }
        return back()->with('error','could not update data');
    }
    public function KppsStatusUpdate(Request $request){
         
        $updateStatus = DB::table('kpps_application')->where('id', $request->app_id)->update(['application_status'=>$request->status_select]); 
        $msg = 'Your Student Pass application is '.$request->status_select;
        if($updateStatus){
            return redirect()->route('emailsend',[$request->applicant_email,$msg]);
            // return back()->with('success','success');
        }
        return back()->with('error','could not update data');
    }

// public function changeVisastatus(Request $request, $id)
// {
//     $id = $request->id;
//     $Initiate = applyvisaextension::find($id);

//     if($Initiate){
       
//     $Initiate->status = 'Approved';
//     $Initiate->save();
//     return back()->with('');

//     }else{
       
//         return back()->with('Inprogress','The Application is already in progress');
//     }
    
// }

    public function NewStudentView($id){
        $dataID= Crypt::decrypt($id);  

        $data= addNewStudent::find($dataID);
        return view('Layouts/AdminActions/StudentProfileView', compact('data'));
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
    public function editUserData(Request $r){
        
        $UpdateUsersDetails = DB::table('student_details')->where('student_id',$r->cr_id)->update(['phone_number'=>$r->phone, 'residence'=>$r->residence, 'faculty'=>$r->faculty, 'course'=>$r->course, 'nationality'=>$r->country, 'passport_number'=>$r->passNo, 'passport_expire_date'=>$r->passEx]);
        $UpdateUsers = DB::table('users')->where('id',$r->cr_id)->update(['id'=>$r->u_id,'surname'=>$r->sname, 'other_names'=>$r->oname, 'email'=>$r->email]);

        $mesg = 'Update made on ';
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
        $GetUsers = DB::table('users')->select('id as user_id','surname','other_names','email','status')->get();
        foreach ($GetUsers as $value) {
            $thisUser=[];
            $isBuddy=false;
            $GetUsersRole = DB::table('user_roles')->where('user_id',$value->user_id)->limit(1)->get();
            $isBuddyChecker = DB::table('user_roles')->where('user_id',$value->user_id)->where('role','buddy')->get();
            if(sizeOf($isBuddyChecker) > 0 ){ $isBuddy = true; }
            if(sizeOf($GetUsersRole) > 0 ){
                $GetUsersDetails = DB::table('student_details')->where('student_id',$value->user_id)->limit(1)->get();
                if($MyRole[0]->role !== 'super_admin'){
                    if(sizeOf($GetUsersDetails) > 0 && $GetUsersRole[0]->role === 'student'){
                        array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                    }
                }else{
                    if(sizeOf($GetUsersDetails) > 0){
                        array_push($data,array_merge((array)$value,(array)$GetUsersDetails[0],['isbuddy'=>$isBuddy,'role'=>$GetUsersRole[0]->role]));
                    }
                }
            }
        }
        return view('Layouts/AdminActions/ListofAllUsers',['users'=>$data]);
    }
    public function getAllkppApplications(){
        // $data= applyKpp::all('id','otherNAMES','passportNUMBER','updated_at','biodataPAGE','currentVISA','policeCLEARANCE','dateofENTRY','Nationality','created_at');
        $kppsDb = DB::table('kpps_application')->get();
        $data=[];
        $applicationStatus=[['pending','in progress','declined','approved']];
        
        foreach ($kppsDb as $application) {
            $fetchUser = DB::table('users')->where('id','=',$application->student_id)->limit(1)->get();
            $fetched = DB::table('student_details')->where('student_id','=',$application->student_id)->limit(1)->get();
            array_push($applicationStatus,$application->application_status);
            $uData = array_merge((array)$fetched[0],(array)$fetchUser[0]);
            array_push($data,array_merge((array)$uData,(array)$application));
        }
        
        return view('Layouts/AdminActions/listofkppsapplications')->with('data',$data)->with('applicationStatus',$applicationStatus);
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
        $roles = DB::table('user_roles')->select('user_id')->where('role','=','buddy')->get();
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
                array_push($data,array_merge((array)$StudentData[0],(array)$buddyData[0]));
        }
        return $data;
    }
    // public function AllocationsFecher(){
    //     $bdAllocations = DB::table('buddies_allocations')->get();
    //     $data=[];
        
    //     foreach ($bdAllocations as $allocation) {
    //         $StudentData = DB::table('users')->select('id','surname','other_names','email')->where('id',$allocation->student_id)->limit(1)->get();
    //         $buddyData = DB::table('users')->select('id as bd_id','surname as bd_srnm','other_names as bd_onm','email as bd_eml')->where('id',$allocation->buddy_id)->limit(1)->get();
    //             array_push($data,array_merge((array)$StudentData[0],(array)$buddyData[0]));
    //     }
    //     return $data;
    // }
    public function RegisterNewBuddy(Request $req){
        $postRole=new Role();

        $postRole->user_id = $req->user_id;
        $postRole->role = 'buddy';

        $postRole->timestamps = false;
        $postRole->save();

        return back()->with('Buddy_Register_success','Student successfully registered as buddy!');
    }
    public function RemoveAsBuddy(Request $req){
        $allAllocatedUsers = DB::table('buddies_allocations')->select('student_id')->where('buddy_id',$req->bd_id)->get();
        foreach ($allAllocatedUsers as $value) {
            if(DB::table('buddy_request')->where('student_id',$value->student_id)->update(['status'=>'pending'])){
                DB::table('buddies_allocations')->where('student_id',$value->student_id)->where('buddy_id',$req->bd_id)->delete();
            }
        }
        if(DB::table('user_roles')->where('user_id',$req->bd_id)->where('role','buddy')->delete()){
            return back()->with('Buddy_Removed_success','User successfully removed as buddy!');
        }else{
            return back()->with('Buddy_Removed_fail','We couldn\'t remove the user as buddy. Try later!');
        }

    }
    public function AllocateBuddy(Request $req){ // new allocation
        
        $generatedId = rand(1000,1000000);
        // if($req->hasFile('student_id','buddy_id')){

        $this->validate($req,[
            'student_id'=>'required',
            'buddy_id'=>'required',
            ]
        );
        $post = new AllocateBuddyModel;
        
        $post->id = $generatedId;
        $post->student_id = $req->student_id;
        $post->buddy_id = $req->buddy_id;
        
        $post->timestamps = false;

        $post->save();
        // $allocatedQuery = ;

        // if($post->save()){
        //     return back()->with('Buddy_Allocation_success','Allocation successful!');
        // }else{
            //     return back()->with('Buddy_Allocation_failed','User allocation failed!');
            // }
        return back()->with('Buddy_Allocation_success','Allocation successful!');
            
            
        // }
        
    }
    public function EditAllocatedBuddy(Request $req){ // new allocation
        
        $generatedId = rand(1000,1000000);

        $this->validate($req,[
            'student_id'=>'required',
            'buddy_id'=>'required',
            ]
        );
        DB::table('buddies_allocations')->where('student_id',$req->student_id)->update(['buddy_id'=>$req->buddy_id]);
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

    

    public function visaextrequests(){
        return view('Layouts/AdminActions/Listofvisaextensionrequests');
    }
    public function BuddiesManagement(){
        return view('Layouts/AdminActions/Buddies',['buddies'=>$this->BuddiesFecher()]);
    }
    public function BuddyAllocationsList(){
        return view('Layouts/AdminActions/listofBuddyAllocations',['BuddiesAllocations'=>$this->AllocationsFecher(),'allbuddies'=>$this->BuddiesFecher(),'stUsers'=>$this->UsersFecher()]);
    }
    public function listofinternationslstudents(){
        return view('Layouts/AdminActions/listofinternationalstudents');
    }
    public function uploads(){
        return view('Layouts/AdminActions/uploads');
    }
    public function initiatedkppApps(){
        return view('Layouts/AdminActions/initiatedkppapps');
    }
    public function AddNewStudent(){
        return view('Layouts/AdminActions/AddNewStudent');
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
    public function generatestudentlist(){
            $list = addNewStudent::count();
            if($list > 0){
            $data= addNewStudent::all();         
            $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/StudentsListPDF',['students'=>$data]);  
            return $pdf->download('Listofstudents.pdf'); 
            }else{
                return back()->with('data_not_available','There is no data available, kindly add the students to generate report');
            }   
                   
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

       

}