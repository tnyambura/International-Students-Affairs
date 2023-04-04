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
Route::get('/passwordreset', [PasswordResetLinkController::class, 'create']);
// Route::post('/passwordreset', [PasswordResetLinkController::class, 'create'])->name('password.email');

Route::post('/getBuddyDetails', [BuddyController::class, 'getBuddyDetails']);
Route::get('/downloadKpps/{file}', [studentactions::class, 'downloadKpps']);
Route::get('/downloadExtension/{file}', [studentactions::class, 'downloadExtensions']);

Route::get('/csv', [CountryController::class, 'readFile']);
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'App\Http\Controllers\DashboardController@home')->name('home');
    Route::get('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');
    
    
    Route::get('/adminDashboard', [pages::class, 'AdminDash'])->middleware('isAdmin');
    // Route::get('/SADashBoard', [pages::class, 'AdminDash'])->middleware('rule:super_admin');
    Route::get('/studentDashboard', [pages::class, 'studentDash'])->middleware('isUser');
    //  Route::get('/NewKPPRequests', [Actions::class, 'NewRequests']);
    //  Route::get('/NewVisaExtensions', [Actions::class, 'NewVisaRequests']);
     
     /** Student Actions */

     Route::get('/fetchkppAppView',[studentactions::class,'FetchKppView'])->middleware('isUser')->name('add.viewKppApp');
     Route::get('/fetchExtensionAppView',[studentactions::class,'FetchExtensionAppView'])->middleware('isUser')->name('add.viewExtApp');
     Route::get('/ApplyKpp', [studentactions::class, 'Newstudentpass'])->middleware('isUser');
     Route::post('/ApplyKpps', [studentactions::class, 'Create_Newstudentpass'])->middleware('isUser')->name('add.newkppapp');
     Route::get('/ApplyVisa', [studentactions::class, 'NewVisaextension'])->middleware('isUser');
     Route::get('/MyAppVIEW/{id}', [studentactions::class, 'NewKPPAPPVIEW'])->middleware('isUser');

     Route::get('/MyAppEDIT/{id}', [studentactions::class, 'NewKPPAPPEDIT'])->middleware('isUser');
     Route::put('/MyAppEDIT/{id}', [studentactions::class, 'updateKPP'])->middleware('isUser')->name('edit.MyAppEDIT');

     Route::get('/MyvisaAppEDIT/{id}', [studentactions::class, 'NewVISAAPPEDIT'])->middleware('isUser');
     Route::put('/MyvisaAppEDIT/{id}', [studentactions::class, 'updateVISA'])->middleware('isUser')->name('edit.MyvisaAppEDIT');


     Route::get('/MyVisaRequestVIEW/{id}', [studentactions::class, 'NewVisaAPPVIEW'])->middleware('isUser');
     Route::get('/MyVisaRequestDownload/{file}', [studentactions::class, 'downloadVisaFile'])->middleware('isUser');


     
     Route::post('/Applyvisaext', [studentactions::class, 'Create_Newvisaextension'])->middleware('isUser')->name('add.newvisaextension');
     Route::get('/MykppApplications', [studentactions::class, 'Listofkpps'])->middleware('isUser');
     Route::get('/MyvisaextApplications', [studentactions::class, 'visaExtensions'])->middleware('isUser');
     
     Route::get('/MyIssuedKpp', [studentactions::class, 'issuedKpp'])->middleware('isUser');
     Route::get('/cancelextApp', [studentactions::class, 'cancelExtApp'])->middleware('isUser');
     Route::get('/cancelKppApp', [studentactions::class, 'cancelKppApp'])->middleware('isUser');
     Route::post('/cancelBuddy', [studentactions::class, 'cancelBuddy'])->middleware('isUser')->name('add.cancelBuddy');
    //  Route::get('/RequestBuddy', [studentactions::class, 'newBuddyRequest'])->middleware('isUser');
     Route::post('/RequestABuddy', [studentactions::class, 'RequestABuddy'])->middleware('isUser')->name('add.requestabuddy');
     Route::post('/requestBuddyChange', [studentactions::class, 'requestBuddyChange'])->middleware('isUser')->name('add.requestBuddyChange');
     Route::get('/BuddyProgram', [studentactions::class, 'BuddyProgram'])->middleware('isUser');
     Route::get('/MyBuddyRequest', [studentactions::class, 'MyBuddyRequest'])->middleware('isUser');
     Route::get('/MyBuddyAllocations', [studentactions::class, 'MyBuddyAllocation'])->middleware('isUser');
     
     
     
     
     
     /** Admin Actions */
     Route::post('/appStatus', [adminactions::class, 'applicationsResponse'])->middleware('isAdmin')->name('add.applicationsResponse');
     Route::get('/verifyAcnt/{email}/{msg}', [MailController::class, 'index'])->middleware('isAdmin')->name('emailsend');
     Route::post('/editMyProfile', [adminactions::class, 'editMyProfile'])->name('add.editMyProfile');
     Route::post('/editUserData', [adminactions::class, 'editUserData'])->name('add.editUserData');
     Route::post('/activate_user', [adminactions::class, 'activate_user'])->middleware('isAdmin')->name('add.activate');
     Route::get('/kppRequestList', [adminactions::class, 'getAllkppApplications'])->middleware('isAdmin');
     Route::get('/VisaRequestList', [adminactions::class, 'getAllvisaextensionrequests'])->middleware('isAdmin');
     Route::get('/initiatedkpps', [adminactions::class, 'initiatedkppApps'])->middleware('isAdmin');
     //  Route::get('/AddNewStudent', [adminactions::class, 'AddNewStudent']);
     Route::get('/AddUser', [RegisteredUserController::class, 'AddNewUser'])->middleware('isAdmin');
     Route::post('/AddUser', [RegisteredUserController::class, 'store'])->middleware('isAdmin');
     Route::get('/NewKPPVIEW/{id}', [adminactions::class, 'NewKPPAPPVIEW'])->middleware('isAdmin');
     Route::get('/NewVISAVIEW/{id}', [adminactions::class, 'NewVISAAPPVIEW'])->middleware('isAdmin');

     Route::post('/kppsStatusUpdate', [adminactions::class, 'KppsStatusUpdate'])->middleware('isAdmin')->name('add.kppsStatusUpdate');
     Route::post('/applicationStatusUpdate', [adminactions::class, 'ExtensionStatusUpdate'])->middleware('isAdmin')->name('add.extensionStatusUpdate');
     Route::post('/applicationStatusUpdate-kpp', [adminactions::class, 'KppsStatusUpdate'])->middleware('isAdmin')->name('add.kppStatusUpdate');
     
     Route::get('/NewStudentView/{id}', [adminactions::class, 'NewStudentView'])->middleware('isAdmin');
     Route::get('/NewAPPFILEDOWNLOAD/{file}/', [adminactions::class, 'download'])->middleware('isAdmin');
     Route::get('/visaRequestDoc/{file}/', [adminactions::class, 'visadownload'])->middleware('isAdmin');


     Route::get('/listsofAllusers', [adminactions::class, 'getallusers'])->middleware('isAdmin');

     Route::get('/AddNewInternationalStudent', [adminactions::class, 'AddNewStudent'])->middleware('isAdmin');
     Route::post('/AddNewInternationalStudent', [adminactions::class, 'Create_AddNewStudent'])->middleware('isAdmin')->name('add.AddNewInternationalStudent');
     Route::get('/listofIS',[adminactions::class,'getallstudents'])->middleware('isAdmin');
     Route::get('/ISdelete/{id}',[adminactions::class,'deletestudentrecord'])->middleware('isAdmin');
     Route::get('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsEdit'])->middleware('isAdmin');
     Route::post('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsUpdate'])->middleware('isAdmin');
     Route::get('/listsofISPDF', [adminactions::class, 'studentslistgenerateReport'])->middleware('isAdmin');
     Route::get('/PDF', [adminactions::class, 'generatestudentlist'])->middleware('isAdmin');
     Route::get('/BuddyAllocationsPDF', [adminactions::class, 'generateBuddyAllocationList'])->middleware('isAdmin');


     Route::get('/ManageBuddies', [adminactions::class, 'BuddiesManagement'])->middleware('isAdmin');
     Route::post('/RegisterBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('isAdmin')->name('add.makeBuddy');
     Route::post('/dismissBudy', [adminactions::class, 'RemoveAsBuddy'])->middleware('isAdmin')->name('add.dismissBd');
     Route::get('/AddNewBuddy', [adminactions::class, 'AddNewBuddy'])->middleware('isAdmin')->name('add.AddNewBuddy');
    //  Route::post('/EnrolNewBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('isAdmin')->name('add.EnrolNewBuddy');
     Route::get('/listofBuddies',[adminactions::class,'getAllBuddies'])->middleware('isAdmin');
     Route::post('/dismissAllocation',[adminactions::class,'dismissAllocation'])->middleware('isAdmin')->name('add.dismiss');
     Route::post('/EditAllocatedBuddy',[adminactions::class,'EditAllocatedBuddy'])->middleware('isAdmin');
     Route::post('/AllocateBuddy',[adminactions::class,'AllocateBuddy'])->middleware('isAdmin');
     Route::post('/BuddyAllocation',[adminactions::class,'BuddyAllocations'])->middleware('isAdmin');
     Route::get('/BuddyAllocationsList',[adminactions::class,'BuddyAllocationsList'])->middleware('isAdmin');
     Route::get('/ListOfBuddies',[adminactions::class,'generateBuddieslist'])->middleware('isAdmin'); // Pdf
     Route::get('/EditBuddyDetails/{id}', [adminactions::class, 'BuddyDetailsEdit'])->middleware('isAdmin');
     Route::post('/UpdateBuddyDetails/{id}', [adminactions::class, 'BuddyDetailsUpdate'])->middleware('isAdmin');
     Route::get('/BuddyDetailsView/{id}', [adminactions::class, 'BuddyDetailsView'])->middleware('isAdmin');




     Route::get('/DeleteBuddy/{id}',[adminactions::class,'deletesBuddyrecord'])->middleware('isAdmin');
     Route::get('/listofBuddyRequests',[adminactions::class,'getBuddyRequests'])->middleware('isAdmin');
     Route::get('/changeStatus/{id}', [adminactions::class,'changeStatus'])->middleware('isAdmin')->name('changeStatus');
     Route::get('/changeVisastatus/{id}', [adminactions::class,'changeVisastatus'])->middleware('isAdmin')->name('changeVisastatus');









     
     
     
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


