<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Middleware\UserHistoryListener;
use App\Http\Middleware\KuesionerCheckMiddleware;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Redis;


Route::get('/', function () {
    return view('welcome');
});

// password 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Authenticate
Route::view('login', 'login')->name('login_form')->middleware('guest');
Route::post('login','AuthController@login')->name('login')->middleware('guest');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('password', 'ChangePasswordController@password')->name('password');
Route::post('updatepw', 'ChangePasswordController@updatepw')->name('password.update');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notification/{id}/{approve_act}', 'NotificationController@update')->name('notif.update');
Route::get('/notification', 'NotificationController@all')->name('notif.all');
Route::get('/email', 'HomeController@email')->name('gisca.email');
Route::get('/testsaja', 'IT_DT\RPA\ITIssueMRController@testaja');

// ERROR CODE
Route::get('error-404', 'ErrorCodeController@error404')->name('error404');
Route::get('error-401', 'ErrorCodeController@error401')->name('error401');
Route::get('error-419', 'ErrorCodeController@error419')->name('error419');
Route::get('error-500', 'ErrorCodeController@error500')->name('error500');

include "routechunks/career.php";

Route::group(['middleware' => ['auth',UserHistoryListener::class,KuesionerCheckMiddleware::class]], function () {

    // SYS_ADMIN
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    include "routechunks/admin/karyawan.php";
    include "routechunks/admin/rolebranch.php";
    include "routechunks/admin/bagian.php";


    include "routechunks/commandcenter.php";
    include "routechunks/analytics.php";

    // 1. IT-DT
    include "routechunks/it_dt.php";

// 3. Marketing
// include "routechunks/marketing.php";

// 4. PPIC
include "routechunks/ppic.php";

// 5 .HR GA
include "routechunks/hr_ga.php";

// 6 .Guide
include "routechunks/guide.php";

// 7 .Mat & Doc
include "routechunks/matdoc.php";

//8. production
include "routechunks/production.php";

// 9. Sample Room
include "routechunks/sample_room.php";

// 10. More Program
include "routechunks/more_program.php";

// 11. Warehouse
include "routechunks/warehouse.php";

// 12. Finishing 
include "routechunks/acc_fin.php";

// // CommanCenter To delete
// include "routechunks/commandcenter/cc.php";
// // 2. GGI Indah 
// include "routechunks/commandcenter/indah.php";
// // 3. Production
// include "routechunks/commandcenter/production.php";
// // 4. IT & DT
// include "routechunks/commandcenter/itdt.php";
// // 5. Audit
// include "routechunks/commandcenter/audit.php";
// // end CommanCenter 

// QC Rework 
// 1. Line
// include "routechunks/qc/qc_rework/line.php";
// 2. Modul
// include "routechunks/qc/qc_rework/modul.php";
// 3. Rework
// include "routechunks/qc/qc_rework/rework.php";
// 4. Wo
// include "routechunks/qc/qc_rework/wo.php";
// 5. DetailTarget
// include "routechunks/qc/qc_rework/detail.php";
// 6. InputAuto
// include "routechunks/qc/qc_rework/auto.php";
// 7. QC Report
// include "routechunks/qc/qc_rework/report.php";
// 8. SPV
// include "routechunks/qc/qc_rework/spv.php";
// 9. Command Center
// include "routechunks/cs.php";
// End 

// QC Sample 
// include "routechunks/qc/sample/sample.php";

// QC Reject Garment
// include "routechunks/qc/reject_garment/reject_garment.php";

// PP Meeting
// include "routechunks/qc/inspection/inspection.php";

// // Marketing
// include "routechunks/marketing/marketing.php";
// // Master PO Number
// include "routechunks/marketing/masterpo.php";
// // Rekap Order
// include "routechunks/marketing/rekaporder.php";
// // Trim Card
// include "routechunks/marketing/trimcard.php";
// // Work Sheet
// include "routechunks/marketing/worksheet.php";



include "routechunks/purchasing/vendor_portal.php";
include "routechunks/purchasing/requestIR.php";


// ggi indah
// 1. indah
include "routechunks/ggi_indah/indah.php";

//production
// include "routechunks/production/production.php";

//Cutting
include "routechunks/cutting.php";
    // 2. Quality Control
    include "routechunks/quality_control.php";

    // 3. Marketing
    include "routechunks/marketing.php";

    // 4. PPIC
    include "routechunks/ppic.php";

    // 5 .HR GA
    include "routechunks/hr_ga.php";

    // 6 .Guide
    include "routechunks/guide.php";

    // 7 .Mat & Doc
    include "routechunks/matdoc.php";

    //8. production
    include "routechunks/production.php";

    // 9. Sample Room
    include "routechunks/sample_room.php";

    // 10. Approval
    include "routechunks/approval.php";


    // // CommanCenter To delete
    // include "routechunks/commandcenter/cc.php";
    // // 2. GGI Indah 
    // include "routechunks/commandcenter/indah.php";
    // // 3. Production
    // include "routechunks/commandcenter/production.php";
    // // 4. IT & DT
    // include "routechunks/commandcenter/itdt.php";
    // // 5. Audit
    // include "routechunks/commandcenter/audit.php";
    // // end CommanCenter 

    // QC Rework 
    // 1. Line
    // include "routechunks/qc/qc_rework/line.php";
    // 2. Modul
    // include "routechunks/qc/qc_rework/modul.php";
    // 3. Rework
    // include "routechunks/qc/qc_rework/rework.php";
    // 4. Wo
    // include "routechunks/qc/qc_rework/wo.php";
    // 5. DetailTarget
    // include "routechunks/qc/qc_rework/detail.php";
    // 6. InputAuto
    // include "routechunks/qc/qc_rework/auto.php";
    // 7. QC Report
    // include "routechunks/qc/qc_rework/report.php";
    // 8. SPV
    // include "routechunks/qc/qc_rework/spv.php";
    // 9. Command Center
    // include "routechunks/cs.php";
    // End 

    // QC Sample 
    // include "routechunks/qc/sample/sample.php";

    // QC Reject Garment
    // include "routechunks/qc/reject_garment/reject_garment.php";

    // PP Meeting
    // include "routechunks/qc/inspection/inspection.php";

    // // Marketing
    // include "routechunks/marketing/marketing.php";
    // // Master PO Number
    // include "routechunks/marketing/masterpo.php";
    // // Rekap Order
    // include "routechunks/marketing/rekaporder.php";
    // // Trim Card
    // include "routechunks/marketing/trimcard.php";
    // // Work Sheet
    // include "routechunks/marketing/worksheet.php";



    include "routechunks/purchasing/vendor_portal.php";


    // ggi indah
    // 1. indah
    include "routechunks/ggi_indah/indah.php";

    //production
    // include "routechunks/production/production.php";

    //Cutting
    include "routechunks/cutting.php";



    //Audit
    include "routechunks/audit.php";
    // //1.Audit NA
    // include "routechunks/audit/auditna.php";
    // //2.Audit pemasukan
    // include "routechunks/audit/p_audit.php";

    // // HR GA
    // // 1.Audit buyer
    // include "routechunks/hr_ga/hr_ga.php";
});
