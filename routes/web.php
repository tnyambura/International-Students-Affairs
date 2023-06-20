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

use App\Models\addNewStudent;
use App\Models\Role;

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

Route::get('/',function () {
    // return view('Layouts.home',['Guides'=>(RegisteredUserController::Guides())?RegisteredUserController::Guides():false]);
    return view('Layouts.home',['Guides'=>(RegisteredUserController::Guides())?array_chunk(RegisteredUserController::Guides(),2):false]);
})->middleware('guest');

Route::get('/stat/{img}',function($img){return view('welcome',['dt'=>$img]);});

Route::get('/file-view/{path}/{file}', 'App\Http\Controllers\studentactions@PDFFileView')->name('PDFFileView');
Route::get('/BuddyRequest', 'App\Http\Controllers\studentactions@BuddyRequest')->name('BuddyRequest');
Route::get('/signup', 'App\Http\Controllers\studentactions@NewSignup')->middleware('guest')->name('signup');
Route::post('/signup', 'App\Http\Controllers\studentactions@AddNewSignup')->name('Add.signup');


Route::get('/forgotpassword', 'App\Http\Controllers\studentactions@ForgotpassUsernameVerifyView');
Route::get('/forgotpassword/code-verification', 'App\Http\Controllers\studentactions@ForgotpassCodeVerifyView');
Route::get('/forgotpassword/reset-password', 'App\Http\Controllers\studentactions@ForgotpassNewPassView');
Route::post('/user-verification', 'App\Http\Controllers\studentactions@ForgotpassUsernameVerify')->name('forgotPassUVer');
Route::post('/code-verification', 'App\Http\Controllers\studentactions@ForgotpassCodeVerify')->name('forgotPassCodeVer');
Route::post('/reset-pass', 'App\Http\Controllers\studentactions@ForgotpassNewPass')->name('forgotPassNew');
Route::get('/forgotpassword/discard-request/{user}', 'App\Http\Controllers\studentactions@ForgotpassDiscard');

Route::post('/getBuddyDetails', [BuddyController::class, 'getBuddyDetails']);
Route::get('/downloadGuides/{file}', [studentactions::class, 'downloadGuides']);
Route::get('/downloadKpps/{file}', [studentactions::class, 'downloadKpps']);
Route::get('/downloadExtension/{file}', [studentactions::class, 'downloadExtensions']);

Route::get('/password/replace', [studentactions::class, 'PasswordReplaceView'])->name('view.replacePass');
Route::post('/password/replace/submit', [studentactions::class, 'PasswordReplace'])->name('add.replacePassword');

Route::get('/csv', [CountryController::class, 'readFile']);
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('view.dashboard');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'App\Http\Controllers\DashboardController@home')->name('home');
    Route::get('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('act.logout');
    
    Route::get('/adminDashboard', [pages::class, 'AdminDash'])->middleware('isAdmin');
    Route::get('/studentDashboard', [pages::class, 'studentDash'])->middleware('isUser');
     
     /** Student Actions */

    //  Visa Action
    Route::get('/visa/kpp/add', [studentactions::class, 'Newstudentpass'])->middleware('isUser')->name('view.newkpp');
    Route::post('/visa/kpp/send', [studentactions::class, 'Create_Newstudentpass'])->middleware('isUser')->name('add.newkppapp');
    Route::get('/visa/kpp/cancel', [studentactions::class, 'cancelKppApp'])->middleware('isUser')->name('view.cancelkpp');

    Route::get('/visa/extension/add', [studentactions::class, 'NewVisaextension'])->middleware('isUser')->name('view.newextension');
    Route::post('/visa/extension/send', [studentactions::class, 'Create_Newvisaextension'])->middleware('isUser')->name('add.newvisaextension');
    Route::get('/visa/extension/cancel', [studentactions::class, 'cancelExtApp'])->middleware('isUser')->name('view.cancelextension');

    Route::get('/first-open', [studentactions::class, 'VisaFirstOpen'])->middleware('isUser')->name('add.firstOpen');
//  Route::get('/MyAppVIEW/{id}', [studentactions::class, 'NewKPPAPPVIEW'])->middleware('isUser');

//  Route::get('/MyAppEDIT/{id}', [studentactions::class, 'NewKPPAPPEDIT'])->middleware('isUser');
//  Route::put('/MyAppEDIT/{id}', [studentactions::class, 'updateKPP'])->middleware('isUser')->name('edit.MyAppEDIT');

//  Route::get('/MyvisaAppEDIT/{id}', [studentactions::class, 'NewVISAAPPEDIT'])->middleware('isUser');
//  Route::put('/MyvisaAppEDIT/{id}', [studentactions::class, 'updateVISA'])->middleware('isUser')->name('edit.MyvisaAppEDIT');


//  Route::get('/MyVisaRequestVIEW/{id}', [studentactions::class, 'NewVisaAPPVIEW'])->middleware('isUser');
//  Route::get('/MyVisaRequestDownload/{file}', [studentactions::class, 'downloadVisaFile'])->middleware('isUser');
    
    
    Route::get('/visa/kpp', [studentactions::class, 'Listofkpps'])->middleware('isUser')->name('view.mykpp');
    Route::get('/visa/extension', [studentactions::class, 'visaExtensions'])->middleware('isUser')->name('view.myextension');
    
    
    // Book meeting
    Route::post('/meeting/booking/save', [studentactions::class, 'bookMeeting'])->middleware('isUser')->name('add.bookMeeting');
    // Buddy Action
    Route::get('/program/buddy', [studentactions::class, 'list_request_BD_View'])->middleware('isUser')->name('view.buddyprogram');
    Route::get('/program/buddy/allocations', [studentactions::class, 'allocationBDView'])->middleware('isUser')->name('view.buddymanage');
    Route::get('/program/buddy/my_allocations', [studentactions::class, 'my_allocationBDView'])->middleware('isUser')->name('view.myallocation');

    
    Route::post('/program/buddy/request', [studentactions::class, 'RequestABuddy'])->middleware('isUser')->name('add.requestabuddy');
    Route::post('/program/buddy/request/change', [studentactions::class, 'requestBuddyChange'])->middleware('isUser')->name('add.requestBuddyChange');
    Route::get('/program/buddy/manage', [studentactions::class, 'MyBuddyRequest'])->middleware('isUser');
    Route::get('/program/buddy/allocations', [studentactions::class, 'MyBuddyAllocation'])->middleware('isUser');
    Route::post('/program/buddy/cancel', [studentactions::class, 'cancelBuddy'])->middleware('isUser')->name('add.cancelBuddy');
    
    
    /** Admin Actions */

    Route::get('/manage/file/guides', [adminactions::class, 'manageFiles'])->middleware('isAdmin')->name('view.manageFiles');
    Route::post('/appStatus', [adminactions::class, 'applicationsResponse'])->middleware('isAdmin')->name('add.applicationsResponse');
    Route::get('/verifyAcnt/{subject}/{email}/{title}/{msg}', [MailController::class, 'index'])->middleware('isAdmin')->name('emailsend');
    Route::post('/editMyProfile', [adminactions::class, 'editMyProfile'])->name('add.editMyProfile');
    Route::post('/editUserData', [adminactions::class, 'editUserData'])->name('add.editUserData');
    Route::post('/activate_user', [adminactions::class, 'activate_user'])->middleware('isAdmin')->name('add.activate');

    // Route::get('/visa', [adminactions::class, 'getAllkppApplications'])->middleware('isAdmin')->name('visa');
    Route::get('/visa/{type}/{status}', [adminactions::class, 'visaRequestData'])->middleware('isAdmin')->name('view.visa');
    Route::get('/visa/{type}/response/{response_status}', [adminactions::class, 'visaResponses'])->middleware('isAdmin');
    // Route::get('/visa', [adminactions::class, 'getAllkppApplications'])->middleware('isAdmin')->name('visa');

    // Route::get('/visa', [adminactions::class, 'getAllkppApplications'])->middleware('isAdmin')->name('visa');
    Route::get('/VisaRequestList', [adminactions::class, 'getAllvisaextensionrequests'])->middleware('isAdmin');
    Route::get('/initiatedkpps', [adminactions::class, 'initiatedkppApps'])->middleware('isAdmin');
    Route::get('/allocations-report', [adminactions::class, 'getallAllocationsReport'])->middleware('isAdmin');
    Route::get('/users-report', [adminactions::class, 'getallusersReport'])->middleware('isAdmin');
    //  Route::get('/AddNewStudent', [adminactions::class, 'AddNewStudent']);
    Route::get('/users/add', [RegisteredUserController::class, 'AddNewUser'])->middleware('isAdmin')->name('view.newuser');
    Route::post('/AddUser', [RegisteredUserController::class, 'store'])->middleware('isAdmin')->name('add.newuser');
    Route::get('/NewKPPVIEW/{id}', [adminactions::class, 'NewKPPAPPVIEW'])->middleware('isAdmin');
    Route::get('/NewVISAVIEW/{id}', [adminactions::class, 'NewVISAAPPVIEW'])->middleware('isAdmin');

    Route::post('/kppsStatusUpdate', [adminactions::class, 'KppsStatusUpdate'])->middleware('isAdmin')->name('add.kppsStatusUpdate');
    Route::post('/applicationStatusUpdate', [adminactions::class, 'ExtensionStatusUpdate'])->middleware('isAdmin')->name('add.extensionStatusUpdate');
    Route::post('/applicationStatusUpdate-kpp', [adminactions::class, 'KppsStatusUpdate'])->middleware('isAdmin')->name('add.kppStatusUpdate');
    
    Route::get('/NewStudentView/{id}', [adminactions::class, 'NewStudentView'])->middleware('isAdmin');
    Route::get('/NewAPPFILEDOWNLOAD/{file}/', [adminactions::class, 'download'])->middleware('isAdmin');
    Route::get('/visaRequestDoc/{file}/', [adminactions::class, 'visadownload'])->middleware('isAdmin');
    Route::get('/meeting-done/{id}/', [adminactions::class, 'MeetingDone'])->middleware('isAdmin');


    Route::get('/manage/time', [adminactions::class, 'myScheduleView'])->middleware('isAdmin')->name('view.schedule');
    Route::get('/users/data', [adminactions::class, 'getallusers'])->middleware('isAdmin')->name('view.allusers');

    Route::get('/AddNewInternationalStudent', [adminactions::class, 'AddNewStudent'])->middleware('isAdmin');
    Route::post('/AddNewInternationalStudent', [adminactions::class, 'Create_AddNewStudent'])->middleware('isAdmin')->name('add.AddNewInternationalStudent');
    Route::get('/listofIS',[adminactions::class,'getallstudents'])->middleware('isAdmin');
    Route::get('/ISdelete/{id}',[adminactions::class,'deletestudentrecord'])->middleware('isAdmin');
    Route::get('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsEdit'])->middleware('isAdmin');
    Route::post('/EditstudentDetails/{id}', [adminactions::class, 'StudentDetailsUpdate'])->middleware('isAdmin');
    Route::get('/listsofISPDF', [adminactions::class, 'studentslistgenerateReport'])->middleware('isAdmin');
    Route::post('/generate-file', [adminactions::class, 'GeneratePDF'])->middleware('isAdmin')->name('add.GeneratePDF');
    Route::post('/save-schedule', [adminactions::class, 'SaveMySchedule'])->middleware('isAdmin')->name('add.saveSchedule');
    
    Route::get('/PDF', [adminactions::class, 'generatestudentlist'])->middleware('isAdmin');
    Route::get('/BuddyAllocationsPDF', [adminactions::class, 'generateBuddyAllocationList'])->middleware('isAdmin');
    
    Route::get('/remove-guide/{id}/{file}', [adminactions::class, 'RemoveGuideFile'])->middleware('isAdmin');

    Route::get('/manage/buddies', [adminactions::class, 'BuddiesManageList'])->middleware('isAdmin')->name('view.buddymanage');
    Route::get('/manage/buddies/requests', [adminactions::class, 'BuddiesManageRequests'])->middleware('isAdmin')->name('view.buddymanageRequest');
    Route::get('/manage/buddies/allocations', [adminactions::class, 'BuddiesManageAllocations'])->middleware('isAdmin')->name('view.buddymanageAllocation');
    Route::post('/RegisterBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('isAdmin')->name('add.makeBuddy');
    Route::post('/reset_password', [adminactions::class, 'ResetUserPassword'])->middleware('isAdmin')->name('add.reset_password');
    Route::post('/dismissBudy', [adminactions::class, 'RemoveAsBuddy'])->middleware('isAdmin')->name('add.dismissBd');
    Route::get('/AddNewBuddy', [adminactions::class, 'AddNewBuddy'])->middleware('isAdmin')->name('add.AddNewBuddy');
//  Route::post('/EnrolNewBuddy', [adminactions::class, 'RegisterNewBuddy'])->middleware('isAdmin')->name('add.EnrolNewBuddy');
    Route::get('/listofBuddies',[adminactions::class,'getAllBuddies'])->middleware('isAdmin');
    Route::post('/dismissAllocation',[adminactions::class,'dismissAllocation'])->middleware('isAdmin')->name('add.dismiss');
    Route::get('/dismissBuddyChange/{id}',[adminactions::class,'DismissBuddyRequestChange'])->middleware('isAdmin');
    Route::post('/EditAllocatedBuddy',[adminactions::class,'EditAllocatedBuddy'])->middleware('isAdmin');
    Route::post('/AllocateBuddy',[adminactions::class,'AllocateBuddy'])->middleware('isAdmin')->name('add.allocate');
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


    Route::get('/viewVisaReport', [adminactions::class,'getAllApprovedVisaReport'])->middleware('isAdmin');
    Route::post('/viewStatisticsReport', [DashboardController::class,'statisticsReport'])->middleware('isAdmin')->name('add.statistics');
    Route::post('/StatReport', [DashboardController::class,'statReport'])->middleware('isAdmin')->name('add.stat');
    Route::post('/manage-file-insert', [adminactions::class,'FileManageInsert'])->middleware('isAdmin')->name('add.FileInsert');
    Route::post('/manage-file-update', [adminactions::class,'FileManageUpdate'])->middleware('isAdmin')->name('add.FileUpdate');
    //  Route::get('/viewStatisticsReport', [DashboardController::class,'statisticsReport'])->middleware('isAdmin');
    Route::get('/statistics-filter/{year}', [DashboardController::class,'getStatistics'])->middleware('isAdmin');
    Route::post('/exportExcel', [adminactions::class,'ExcelExport'])->middleware('isAdmin')->name('add.exportExcel');
                
});

require __DIR__.'/auth.php';


