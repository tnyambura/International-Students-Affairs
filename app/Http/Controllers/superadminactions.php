<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use App\Models\User;
use App\Models\addNewStudent;
use App\Models\addNewAdmin;
use App\Models\applykpp;
use App\Models\applyvisaextension;
use DB;



class superadminactions extends Controller
{
    public function kpprequests(){
        $data= applykpp::all('id','otherNAMES','passportNUMBER','updated_at','biodataPAGE','currentVISA','policeCLEARANCE','dateofENTRY','Nationality','created_at');
        return view('Layouts/SuperAdminActions/listofkppsapplications',['data'=>$data]);
    }
    Public function visaextrequests(){
        $data= applyvisaextension::all('id','surNAME','suEMAIL','otherNAMES','passportNUMBER','updated_at','Biodata','entryVISA','dateofENTRY','Nationality','created_at');
       return view('Layouts/SuperAdminActions/Listofvisaextensionrequests',['visarequests'=>$data]);
   }
    public function listofinternationslstudents(){
        return view('Layouts/SuperAdminActions/listofinternationalstudents');
    }
    public function getallusers(){
        $data= User::all('id','surname','other_names','email');
        return view('Layouts/SuperAdminActions/listofallusers',['users'=>$data]);
    }
    public function uploads(){
        return view('Layouts/SuperAdminActions/uploads');
    }
    public function initiatedkppApps(){
        return view('Layouts/SuperAdminActions/initiatedkppapps');
    }
//     Public function deletestudentrecord($id){
        
//         DB::table('add_new_students')->where('id', $id)->delete();        
//         return back()->with('Record_deleted','Record has been Deleted Successfully');
//    }
   Public function StudentDetailsEdit($id){
    $data= addNewStudent::find($id);
    return view('Layouts/SuperAdminActions/EditNewStudent', compact('data'));
    }
    Public function StudentDetailsUpdate(request $req , $id){
        
        $data = addNewStudent::find($req->id);        
        
        // $data->id = $req->suID;
        // $data->surname = $req->surname;
        // $data->other_names = $req->firstNAME.' '.$req->lastNAME;
        // $data->email = $req->suEMAIL;
        // $data->password = $req->passportNUMBER;
        

        // $data->surNAME = $req->surNAME;
        // $data->firstNAME = $req->firstNAME;
        // $data->lastNAME = $req->lastNAME;
        // $data->suID = $req->suID;
        // $data->suEMAIL = $req->suEMAIL;
        // $data->Faculty = $req->Faculty;
        // $data->Nationality = $req->Nationality;
        // $data->Course = $req->Course;
        // $data->Residence = $req->Residence;
        // $data->phoneNUMBER = $req->phoneNUMBER;
        // $data->passportNUMBER = $req->passportNUMBER;

        $data->update();
        // return back()->with('Record_Updated','Record has been Updated Successfully');
        return redirect('/listsofIS')->with('Record_Updated','Record has been Updated Successfully');
        

     }




    public function AddNewUser(){
        return view('Layouts/SuperAdminActions/addAdmin');
    }
    public function AddNewStudent(){
        return view('Layouts/SuperAdminActions/AddNewStudent');
    }  
    Public function create_addNewStudent(request $request){
        $id = $request->suID;        
        $data = DB::select("select * from users WHERE id= $id ");

        if($data == false){
        $post = new addNewStudent();
        $post->suID = $request->suID;
        $post->suEMAIL = $request->suEMAIL;
        $post->surNAME = $request->surNAME;
        $post->firstNAME = $request->firstNAME;
        $post->lastNAME = $request->lastNAME;
        $post->Faculty = $request->Faculty;
        $post->Course = $request->Course;
        $post->Nationality = $request->Nationality;
        $post->Residence = $request->Residence;
        $post->phoneNUMBER = $request->phoneNUMBER;
        $post->passportNUMBER = $request->passportNUMBER;
        $post->save();
        return back()->with('New_Student_Added','A New International Student Details has been Recorded succcessfully');
        }else{
            return back()->with('New_Student_failed','A user with same suID is already Registered!');
        }
    }
    Public function getallstudents(){
        $data= addNewStudent::all('id','suID','passportNUMBER','suEMAIL','surNAME','firstNAME','lastNAME','Course','Nationality');
       return view('Layouts/SuperAdminActions/listofInternationalstudents',['students'=>$data]);
   }


//    List of Users Management Section  //
        public function NewStudentManage($id){
            $dataID= Crypt::decrypt($id);  

            $data= User::find($dataID);
            return view('Layouts/SuperAdminActions/StudentProfileView', compact('data'));
        }


public function changeUserStatusActive(Request $request, $id)
{
    $id = $request->id;
    $Initiate = User::find($id);
      
    if($Initiate){       
    $Initiate->status = '1';
    $Initiate->save();
    return back()->with('');

    }else{       
        return back()->with('UserStatus','The User Account is Active');   
    }
    
}

public function  changeUserStatusInactive(Request $request, $id)
{
    $id = $request->id;
    $Initiate = User::find($id);

    if($Initiate){
       
    $Initiate->status = '0';
    $Initiate->save();
    return back()->with('');

    }else{
       
        return back()->with('UserStatus','The User Account is Suspended');
    }
    
}
    
}
