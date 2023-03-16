<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\addNewStudent;
use App\Models\Request_Buddy;
use App\Models\FetchBuddyRequests;
use App\Models\FetchBuddies;
use App\Models\FetchCountries;
use App\Models\User;
use App\Models\buddies_allocation;
use App\Models\addNewBuddy;
use App\Models\applyKpp;
use App\Models\applyvisaextension;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use DB;





class adminactions extends Controller
{
    public function NewKPPAPPVIEW($id){
    $dataID= Crypt::decrypt($id);   

    $data= applyKpp::find($dataID);
    return view('Layouts/AdminActions/kppapplicationView', compact('data'));
    }
    public function NewVISAAPPVIEW($id){
        $dataID= Crypt::decrypt($id);   

        $visarequests= applyvisaextension::find($dataID);
        return view('Layouts/AdminActions/visaapplicationView', compact('visarequests'));
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

public function changeVisastatus(Request $request, $id)
{
    $id = $request->id;
    $Initiate = applyvisaextension::find($id);

    if($Initiate){
       
    $Initiate->status = 'Approved';
    $Initiate->save();
    return back()->with('');

    }else{
       
        return back()->with('Inprogress','The Application is already in progress');
    }
    
}

    public function NewStudentView($id){
        $dataID= Crypt::decrypt($id);  

        $data= addNewStudent::find($dataID);
        return view('Layouts/AdminActions/StudentProfileView', compact('data'));
    }
   Public Function download(Request $request, $file){   
   
    $path = 'storage/kpps/'.$file;

    if(storage::exists($path)){

   return response()->download('storage/kpps/'.$file);
    }else{
        return back()->with('No_File','File Not Found');
    }

   }
    Public Function visadownload(Request $request, $file){   

        $path = 'storage/visaExtensionfiles/'.$file;

        if(storage::exists($path)){

       return response()->download('storage/visaExtensionfiles/'.$file);
        }else{

             return back()->with('No_File','File Not Found');
        }
       
    }
    public function getallusers(){
        $data = DB::table('student_view_data')->get();        
        return view('Layouts/AdminActions/ListofAllUsers',['users'=>$data]);
    }
    Public function getAllkppApplications(){
        // $data= applyKpp::all('id','otherNAMES','passportNUMBER','updated_at','biodataPAGE','currentVISA','policeCLEARANCE','dateofENTRY','Nationality','created_at');
       return view('Layouts/AdminActions/listofkppsapplications')->with('data',['app']);
    }
    Public function getAllvisaextensionrequests(){
        $data= applyvisaextension::all('id','surNAME','status','suEMAIL','otherNAMES','passportNUMBER','updated_at','Biodata','entryVISA','dateofENTRY','Nationality','created_at');
       return view('Layouts/AdminActions/Listofvisaextensionrequests',['visarequests'=>$data]);
    }

       public function visaextrequests(){
        return view('Layouts/AdminActions/Listofvisaextensionrequests');
    }
    public function BuddiesManagement(){
        return view('Layouts/AdminActions/Buddies');
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
    // public function Create_AddNewStudent(request $request){
    //     $id = $request->suID;        
    //     $data = DB::select("select * from add_new_students WHERE suID= $id ");

    //     if($data == false){
    //     $post = new addNewStudent();
    //     $post->suID = $request->suID;
    //     $post->suEMAIL = $request->suEMAIL;
    //     $post->surNAME = $request->surNAME;
    //     $post->firstNAME = $request->firstNAME;
    //     $post->lastNAME = $request->lastNAME;
    //     $post->Faculty = $request->Faculty;
    //     $post->Course = $request->Course;
    //     $post->Nationality = $request->Nationality;
    //     $post->Residence = $request->Residence;
    //     $post->phoneNUMBER = $request->phoneNUMBER;
    //     $post->passportNUMBER = $request->passportNUMBER;
    //     $post->ParentEmail = $request->ParentEmail;
    //     $post->ParentPhone = $request->ParentPhone;
    //     $post->ParentNames = $request->ParentNames;
    //     $post->save();
    //     return redirect('/listofIS')
    //     ->with('New_Student_Added','New International Student data has been added Successfully');
    //     }else{
    //         return back()->with('New_Student_failed','A student with same Admission Number is already Registered!');
    //     }
    //     }

    //     //NEW BUDDY REGISTRATION//

    //     public function AddNewBuddy(request $request){
    //         return view('Layouts/AdminActions/AddNewBuddy');
    //     }
    //     public function RegisterNewBuddy(request $request){

    //         $id = $request->suID;        
    //         $data = DB::select("select * from buddies WHERE suID= $id ");
    
    //         if($data == false){
    //         $post = new addNewBuddy();
    //         $post->suID = $request->suID;
    //         $post->email = $request->email;
    //         $post->Residence = $request->Residence;
    //         $post->surNAME = $request->surNAME;
    //         $post->otherNAMES = $request->otherNAMES;
    //         $post->Faculty = $request->Faculty;
    //         $post->course = $request->course;
    //         $post->Nationality = $request->Nationality;
    //         $post->phoneNUMBER = $request->phoneNUMBER;
    //         $post->passportNUMBER = $request->passportNUMBER;
    //         $post->save();
    //         return redirect('/AddNewBuddy')
    //         ->with('New_Student_Added','New Buddy has been enrolled Successfully');
    //         }else{
    //             return back()->with('New_Student_failed','A Buddy with same Admission Number is already Registered!');
    //         }
    //         }
    //     //END OF NEW BUDDY REGISTRATION//

    //     //Buddies Management Area//

    //     public function BuddyAllocations(request $request){

    //         $id = $request->suID;        
    //         $data = DB::select("select * from buddies_allocation WHERE newSTD_suID= $id ");
    
    //         if($data == false){
    //         $post = new buddies_allocation();
            
    //         $post->NewSTD_surNAME = $request->surNAME;
    //         $post->NewSTD_otherNAMES = $request->otherNAMES;
    //         $post->NewSTD_passportNUMBER = $request->passportNUMBER;
    //         $post->NewSTD_suID = $request->suID;
    //         $post->NewSTD_course = $request->Course;
    //         $post->NewSTD_Nationality = $request->Nationality;
    //         $post->NewSTD_Faculty = $request->Faculty;
    //         $post->NewSTD_email = $request->suEMAIL;

    //         $post->Buddy_otherNAMES = $request->BuddyName;
    //         $post->Buddy_suID = $request->BuddyID;

    //         $post->save();
    //         return redirect('/listofBuddyRequests')
    //         ->with('Buddy_Allocated','New Buddy has been Allocated Successfully');
    //         }else{
    //             return back()->with('Buddy_Allocation_failed','A Buddy Has Already Been Allocated to the Student!');
    //         }
    //         }

    //     Public function getallBuddies(){
    //         $data= addNewBuddy::all('id','suID','email','surNAME','otherNAMES','course','Nationality');
    //         return view('Layouts/AdminActions/listofBuddies',['students'=>$data]);
    //        }
    //     public function getBuddyRequests(){
    //         $data= Request_Buddy::all('id','suID','email','surNAME','otherNAMES','course','Nationality');
    //         return view('Layouts/AdminActions/listofBuddyRequests',['buddies'=>$data]);
    //     }
    //     Public function deletesBuddyrecord($id){
    //     $dataID= Crypt::decrypt($id);   

    //     DB::table('buddies')->where('id', $dataID)->delete();        
    //     return back()->with('Record_deleted','Record has been Deleted Successfully');

    //     }
    //     public function AllocateBuddies($id){
    //         $get_data= FetchCountries::get();
    //         $data = array('get_data'=>$get_data);

    //         $get_Buddydata= FetchBuddies::get();
    //         $Buddydata = array('get_Buddydata'=>$get_Buddydata);

    //         $dataID= Crypt::decrypt($id);
    //         $BuddyRequest= Request_Buddy::find($dataID);
    //         return view('Layouts/AdminActions/AllocateBuddies', compact('get_data','BuddyRequest','get_Buddydata'));
    //     }

    //     Public function BuddyAllocationsList(){
    //         $Buddies= buddies_allocation::all();
    //        return view('Layouts/AdminActions/listofBuddyAllocations',['Buddies'=>$Buddies]);
    //     }

    //     Public function generateBuddyAllocationList(){
    //         $list = buddies_allocation::count();
    //         if($list > 0){
    //         $data= buddies_allocation::all();         
    //         $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/BuddyAllocationsPDF',['data'=>$data]);  
    //         return $pdf->download('BuddyAllocations.pdf'); 
    //         }else{
    //             return back()->with('data_not_available','No data available');
    //         }                    
    //     }

    //     Public function generateRegisteredBuddiesList(){
    //         $list = FetchBuddies::count();
    //         if($list > 0){
    //         $data= FetchBuddies::all();         
    //         $pdf = PDF::setOptions(['isPhpEnabled' => true])->LoadView('Layouts/AdminActions/ListofBuddiesPDF',['data'=>$data]);  
    //         return $pdf->download('ListOfRegisteredBuddies.pdf'); 
    //         }else{
    //             return back()->with('data_not_available','No data available');
    //         }                      
    //     }

    //     Public function BuddyDetailsEdit($id){
    //         $dataID= Crypt::decrypt($id); 
    //         $data= FetchBuddies::find($dataID);
    //         return view('Layouts/AdminActions/EditBuddyDetails', compact('data'));
    //      }

    //      Public function BuddyDetailsUpdate(request $req , $id){
        
    //         $data = FetchBuddies::find($req->id);        
            
    //         $data->surNAME = $req->surNAME;
    //         $data->otherNAMES = $req->otherNAMES;
    //         $data->suID = $req->suID;
    //         $data->email = $req->email;
    //         $data->Faculty = $req->Faculty;
    //         $data->Nationality = $req->Nationality;
    //         $data->course = $req->course;
    //         $data->Residence = $req->Residence;
    //         $data->phoneNUMBER = $req->phoneNUMBER;
    //         $data->passportNUMBER = $req->passportNUMBER;
    
    //         $data->update();
    //         // return back()->with('Record_Updated','Record has been Updated Successfully');
    //         return redirect('/listofBuddies')->with('Record_Updated','Record has been Updated Successfully');        
    
    //         }

    //         Public function BuddyDetailsView($id){
    //             $dataID= Crypt::decrypt($id); 
    //             $data = FetchBuddies::find($dataID);        
    //             return view('Layouts/AdminActions/BuddyDetailsView', compact('data'));
    //          }
            

    //     //End of Buddy Management Area//
    //    Public function getallstudents(){
    //      $data= addNewStudent::all('id','suID','suEMAIL','firstNAME','lastNAME','Course','Nationality');
    //      return view('Layouts/AdminActions/listofInternationalstudents',['students'=>$data]);
    //     }

    Public function generatestudentlist(){
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
    Public function deletestudentrecord($id){
        $dataID= Crypt::decrypt($id);   

        DB::table('add_new_students')->where('id', $dataID)->delete();        
        return back()->with('Record_deleted','Record has been Deleted Successfully');

        }

   
   Public function StudentDetailsEdit($id){
    $dataID= Crypt::decrypt($id); 
    $data= addNewStudent::find($dataID);
    return view('Layouts/AdminActions/EditNewStudent', compact('data'));
        }

    Public function StudentDetailsUpdate(request $req , $id){
        
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