<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ConsultantController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\MembersController;
use App\Http\Controllers\admin\KycController;
use App\Http\Controllers\admin\DepositController;
use App\Http\Controllers\admin\WithdrawController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::group(['prefix' => 'admin'], function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('login_submit', [LoginController::class, 'login_submit'])->name('login_submit');


    Route::get('forgetpassword', [HomeController::class, 'forgetpassword'])->name('forgetpassword');
    Route::post('post-forgetpassword', [HomeController::class, 'postForgetpassword'])->name('forgetpassword.post');

    Route::group(['middleware' => ['auth']], function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile-edit', [DashboardController::class, 'profile_edit'])->name('profile_edit');
        Route::get('view_account', [DashboardController::class, 'view_account'])->name('view_account');
        Route::post('profile-update/{id}', [DashboardController::class, 'profile_update'])->name('profile_update');
        Route::get('change-password', [DashboardController::class, 'change_password'])->name('change_password');
        Route::post('change-password-post', [DashboardController::class, 'change_password_post'])->name('change_password_post');
        Route::get('current_auth_password', [DashboardController::class, 'current_auth_password'])->name('current_auth_password');
        Route::get('bank_details',[DashboardController::class,"bank_details"])->name('bank_details');
        Route::post('bank_details_update',[DashboardController::class,"bank_details_update"])->name('bank_details_update');

        Route::resource('consultant',ConsultantController::class);
        Route::get('unique_user_email', [ConsultantController::class, 'unique_user_email'])->name('unique_user_email');
        Route::get('consultant_status_change', [ConsultantController::class,'consultant_status_change'])->name('consultant_status_change');

        Route::resource('setting',SettingController::class);
        Route::get('setting_unique_name',[SettingController::class,"setting_unique_name"])->name('setting_unique_name');
        Route::get('setting_unique_name_update',[SettingController::class,"setting_unique_name_update"])->name('setting_unique_name_update');

        Route::resource('members',MembersController::class);
        Route::get('members_destroy/{id?}', [MembersController::class, 'members_destroy'])->name('members_destroy');
        Route::get('view_data/{id?}', [MembersController::class, 'view_data'])->name('view_data');
        Route::get('view_member_data/{id?}', [MembersController::class, 'view_member_data'])->name('view_member_data');
        Route::get('view_parent_data/{id?}', [MembersController::class, 'view_parent_data'])->name('view_parent_data');
        Route::get('kyc_approve/{id?}', [MembersController::class, 'kyc_approve'])->name('kyc_approve');

        Route::resource('kyc',KycController::class);

        Route::resource('depositdetails',DepositController::class);

        Route::resource('withdraw',WithdrawController::class);
        Route::get('notification', [WithdrawController::class, 'notification'])->name('notification');
        Route::get('approve/{id?}', [WithdrawController::class, 'approve'])->name('approve');

    });
});
