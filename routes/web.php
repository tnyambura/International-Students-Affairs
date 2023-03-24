<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\pages;
use App\Http\Controllers\Actions;
use App\Http\Controllers\studentactions;
use App\Http\Controllers\UpdateVisaRecords;
use App\Http\Controllers\MailController;
use App\Http\Controllers\adminactions;
use App\Http\Controllers\superadminactions;
use App\Http\Controllers\BuddyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layouts.home');
});

Route::get('/db',function(){
    return view('dbCheck');
});

Route::get('/BuddyRequest', 'App\Http\Controllers\studentactions@BuddyRequest')->name('BuddyRequest');
Route::get('/signup', 'App\Http\Controllers\studentactions@NewSignup')->name('signup');
Route::post('/signup', 'App\Http\Controllers\studentactions@AddNewSignup')->name('Add.signup');
Route::get('/home', 'App\Http\Controllers\DashboardController@home')->name('home');
Route::get('/passwordreset', [PasswordResetLinkController::class, 'create']);

Route::post('/getBuddyDetails', [BuddyController::class, 'getBuddyDetails']);
Route::get('/downloadKpps/{file}', [studentactions::class, 'downloadKpps']);
Route::get('/downloadExtension/{file}', [studentactions::class, 'downloadExtensions']);

Route::get('/csv', [CountryController::class, 'readFile']);
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');
    
    
    Route::get('/adminDashboard', [pages::class, 'AdminDash'])->middleware('rule:admin')->middleware('rule:super_admin');
    // Route::get('/SADashBoard', [pages::class, 'AdminDash'])->middleware('rule:super_admin');
    Route::get('/studentDashboard', [pages::class, 'studentDash'])->middleware('rule:student');
    //  Route::get('/NewKPPRequests', [Actions::class, 'NewRequests']);
    //  Route::get('/NewVisaExtensions', [Actions::class, 'NewVisaRequests']);
     
     /** Student Actions */

     Route::get('/fetchkppAppView',[studentactions::class,'FetchKppView'])->middleware('rule:student')->name('add.viewKppApp');
     Route::get('/fetchExtensionAppView',[studentactions::class,'FetchExtensionAppView'])->middleware('rule:student')->name('add.viewExtApp');
     Route::get('/ApplyKpp', [studentactions::class, 'Newstudentpass'])->middleware('rule:student');
     Route::post('/ApplyKpps', [studentactions::class, 'Create_Newstudentpass'])->middleware('rule:student')->name('add.newkppapp');
     Route::get('/ApplyVisa', [studentactions::class, 'NewVisaextension'])->middleware('rule:student');
     Route::get('/MyAppVIEW/{id}', [studentactions::class, 'NewKPPAPPVIEW'])->middleware('rule:student');

     Route::get('/MyAppEDIT/{id}', [studentactions::class, 'NewKPPAPPEDIT'])->middleware('rule:student');
     Route::put('/MyAppEDIT/{id}', [studentactions::class, 'updateKPP'])->middleware('rule:student')->name('edit.MyAppEDIT');

     Route::get('/MyvisaAppEDIT/{id}', [studentactions::class, 'NewVISAAPPEDIT'])->middleware('rule:student');
     Route::put('/MyvisaAppEDIT/{id}', [studentactions::class, 'updateVISA'])->middleware('rule:student')->name('edit.MyvisaAppEDIT');


     Route::get('/MyVisaRequestVIEW/{id}', [studentactions::class, 'NewVisaAPPVIEW'])->middleware('rule:student');
     Route::get('/MyVisaRequestDownload/{file}', [studentactions::class, 'downloadVisaFile'])->middleware('rule:student');


     
     Route::post('/Applyvisaext', [studentactions::class, 'Create_Newvisaextension'])->middleware('rule:student')->name('add.newvisaextension');
     Route::get('/MykppApplications', [studentactions::class, 'Listofkpps'])->middleware('rule:student');
     Route::get('/MyvisaextApplications', [studentactions::class, 'visaExtensions'])->middleware('rule:student');
     
     Route::get('/MyIssuedKpp', [studentactions::class, 'issuedKpp'])->middleware('rule:student');
     Route::get('/cancelextApp', [studentactions::class, 'cancelExtApp'])->middleware('rule:student');
     Route::get('/cancelKppApp', [studentactions::class, 'cancelKppApp'])->middleware('rule:student');
     Route::get('/cancelBuddy', [studentactions::class, 'cancelBuddy'])->middleware('rule:student');
     Route::get('/RequestBuddy', [studentactions::class, 'newBuddyRequest'])->middleware('rule:student');
     Route::post('/RequestABuddy', [studentactions::class, 'RequestABuddy'])->middleware('rule:student')->name('add.requestabuddy');
     Route::get('/BuddyProgram', [studentactions::class, 'BuddyProgram'])->middleware('rule:student');
     Route::get('/MyBuddyRequest', [studentactions::class, 'MyBuddyRequest'])->middleware('rule:student');
     Route::get('/MyBuddyAllocations', [studentactions::class, 'MyBuddyAllocation'])->middleware('rule:student');
     
     
     
     
     
     /** Admin Actions */
     Route::get('/verifyAcnt/{email}/{msg}', [MailController::class, 'index'])->middleware('rule:admin')->middleware('rule:super_admin')->name('emailsend');
     Route::post('/editUserData', [adminactions::class, 'editUserData'])->name('add.editUserData');
     Route::post('/activate_user', [adminactions::class, 'activate_user'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.activate');
     Route::get('/kppRequestList', [adminactions::class, 'getAllkppApplications'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/VisaRequestList', [adminactions::class, 'getAllvisaextensionrequests'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/initiatedkpps', [adminactions::class, 'initiatedkppApps'])->middleware('rule:admin')->middleware('rule:super_admin');
     //  Route::get('/AddNewStudent', [adminactions::class, 'AddNewStudent']);
     Route::get('/AddUser', [RegisteredUserController::class, 'AddNewUser'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/AddUser', [RegisteredUserController::class, 'store'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/NewKPPVIEW/{id}', [adminactions::class, 'NewKPPAPPVIEW'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/NewVISAVIEW/{id}', [adminactions::class, 'NewVISAAPPVIEW'])->middleware('rule:admin')->middleware('rule:super_admin');

     Route::post('/kppsStatusUpdate', [adminactions::class, 'KppsStatusUpdate'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.kppsStatusUpdate');
     Route::post('/applicationStatusUpdate', [adminactions::class, 'ExtensionStatusUpdate'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.extensionStatusUpdate');
     
     Route::get('/NewStudentView/{id}', [adminactions::class, 'NewStudentView'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/NewAPPFILEDOWNLOAD/{file}/', [adminactions::class, 'download'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/visaRequestDoc/{file}/', [adminactions::class, 'visadownload'])->middleware('rule:admin')->middleware('rule:super_admin');


     Route::get('/listsofAllusers', [adminactions::class, 'getallusers'])->middleware('rule:admin')->middleware('rule:super_admin');

     Route::get('/AddNewInternationalStudent', [adminactions::class, 'AddNewStudent'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/AddNewInternationalStudent', [adminactions::class, 'Create_AddNewStudent'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.AddNewInternationalStudent');
     Route::get('/listofIS',[adminactions::class,'getallstudents'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/ISdelete/{id}',[adminactions::class,'deletestudentrecord'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsEdit'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsUpdate'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/listsofISPDF', [adminactions::class, 'studentslistgenerateReport'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/PDF', [adminactions::class, 'generatestudentlist'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/BuddyAllocationsPDF', [adminactions::class, 'generateBuddyAllocationList'])->middleware('rule:admin')->middleware('rule:super_admin');


     Route::get('/ManageBuddies', [adminactions::class, 'BuddiesManagement'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/RegisterBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.makeBuddy');
     Route::post('/dismissBudy', [adminactions::class, 'RemoveAsBuddy'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.dismissBd');
     Route::get('/AddNewBuddy', [adminactions::class, 'AddNewBuddy'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.AddNewBuddy');
    //  Route::post('/EnrolNewBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('rule:admin')->middleware('rule:super_admin')->name('add.EnrolNewBuddy');
     Route::get('/listofBuddies',[adminactions::class,'getAllBuddies'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/EditAllocatedBuddy',[adminactions::class,'EditAllocatedBuddy'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/AllocateBuddy',[adminactions::class,'AllocateBuddy'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/BuddyAllocation',[adminactions::class,'BuddyAllocations'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/BuddyAllocationsList',[adminactions::class,'BuddyAllocationsList'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/ListOfBuddies',[adminactions::class,'generateBuddieslist'])->middleware('rule:admin')->middleware('rule:super_admin'); // Pdf
     Route::get('/EditBuddyDetails/{id}', [adminactions::class, 'BuddyDetailsEdit'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::post('/UpdateBuddyDetails/{id}', [adminactions::class, 'BuddyDetailsUpdate'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/BuddyDetailsView/{id}', [adminactions::class, 'BuddyDetailsView'])->middleware('rule:admin')->middleware('rule:super_admin');




     Route::get('/DeleteBuddy/{id}',[adminactions::class,'deletesBuddyrecord'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/listofBuddyRequests',[adminactions::class,'getBuddyRequests'])->middleware('rule:admin')->middleware('rule:super_admin');
     Route::get('/changeStatus/{id}', [adminactions::class,'changeStatus'])->middleware('rule:admin')->middleware('rule:super_admin')->name('changeStatus');
     Route::get('/changeVisastatus/{id}', [adminactions::class,'changeVisastatus'])->middleware('rule:admin')->middleware('rule:super_admin')->name('changeVisastatus');









     
     
     
    //  /** SuperAdmin Actions */
    //  Route::get('/kppRequests', [superadminactions::class, 'kpprequests'])->middleware('rule:super_admin');
    //  Route::get('/VisaRequests', [superadminactions::class, 'visaextrequests'])->middleware('rule:super_admin');
    //  Route::get('/initiatedkpp', [superadminactions::class, 'initiatedkppApps'])->middleware('rule:super_admin');
    //  Route::get('/RegisterNewStudent', [superadminactions::class, 'AddNewStudent'])->middleware('rule:super_admin');
    //  Route::post('/RegisterNewStudent', [superadminactions::class, 'create_addNewStudent'])->middleware('rule:super_admin')->name('add.RegisterNewStudent');
    //  Route::get('/AddStudent', [superadminactions::class, 'AddNewStudent'])->middleware('rule:super_admin');
    //  Route::post('/AddNewAdmin', [superadminactions::class, 'create_addnewadmin'])->middleware('rule:super_admin')->name('add.NewAdmin');
    //  Route::get('/listsofIS', [superadminactions::class, 'getallstudents'])->middleware('rule:super_admin');
    //  Route::get('/listsofAllUsers', [superadminactions::class, 'getallusers'])->middleware('rule:super_admin');
    //  Route::get('/EditstudentRecords/{id}', [superadminactions::class, 'StudentDetailsEdit'])->middleware('rule:super_admin');
    //  Route::post('/EditstudentRecords/{id}', [superadminactions::class, 'StudentDetailsUpdate'])->middleware('rule:super_admin');


    //  Route::get('/DeleteRSTD/{id}',[superadminactions::class,'deletestudentrecord'])->middleware('rule:super_admin');
    //  Route::get('/EnrollNewUser', [RegisteredUserController::class, 'SuperAddNewUser'])->middleware('rule:super_admin')->name('register');
    //  Route::post('/EnrollNewUser', [RegisteredUserController::class, 'store'])->middleware('rule:super_admin');

    //  Route::get('/ManageUser/{id}', [superadminactions::class, 'NewStudentManage'])->middleware('rule:super_admin');

    //  Route::get('/changeUserStatusActive/{id}', [superadminactions::class,'changeUserStatusActive'])->middleware('rule:super_admin')->name('changeUserStatusActive');
    //  Route::get('/changeUserStatusInactive/{id}', [superadminactions::class,'changeUserStatusInactive'])->middleware('rule:super_admin')->name('changeUserStatusInactive');

                
     });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
