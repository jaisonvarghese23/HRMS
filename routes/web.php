<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\LoginCOntroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginCOntroller::class,'login'])->name('login');
Route::post('dologin',[LoginCOntroller::class,'dologin'])->name('dologin');

Route::group(['middleware'=>'user_auth'],function(){
    Route::get('logout',[LoginCOntroller::class,'logout'])->name('logout');



    Route::get('Home',[HrController::class,'index'])->name('Dashboard');
    Route::get('Recruitment',[HrController::class,'Recruitment'])->name('Recruitment');
    Route::get('department',[HrController::class,'department'])->name('department');
    Route::get('projects',[HrController::class,'projects'])->name('projects');
    Route::get('createProject',[HrController::class,'createProject'])->name('createProject');
    Route::get('runningProjects',[HrController::class,'runningProjects'])->name('runningProjects');
    Route::get('designation',[HrController::class,'designation'])->name('designation');
    Route::post('adddepartment',[HrController::class,'adddepartment'])->name('adddepartment');
    Route::post('deletedepartment',[HrController::class,'deletedepartment'])->name('deletedepartment');
    Route::post('adddesignation',[HrController::class,'adddesignation'])->name('adddesignation');
    Route::post('deletedesignation',[HrController::class,'deletedesignation'])->name('deletedesignation');
    Route::post('addrecruitment',[HrController::class,'addrecruitment'])->name('addrecruitment');
    Route::get('profile',[HrController::class,'profile'])->name('profile');
    Route::post('profileUpdate',[HrController::class,'profileUpdate'])->name('profileUpdate');
    Route::post('PasswordUpdate',[HrController::class,'PasswordUpdate'])->name('PasswordUpdate');
    Route::post('addproject',[HrController::class,'addproject'])->name('addproject');
    Route::get('viewEmployee/{id}',[HrController::class,'viewEmployee'])->name('viewEmployee');
    Route::get('HrLeave',[HrController::class,'HrLeave'])->name('HrLeave');
    Route::get('attendance',[HrController::class,'attendance'])->name('attendance');
    Route::post('updateleavestatus',[HrController::class,'updateleavestatus'])->name('updateleavestatus');
    Route::get('approvedLeaves',[HrController::class,'approvedLeaves'])->name('approvedLeaves');
    Route::get('rejectedLeaves',[HrController::class,'rejectedLeaves'])->name('rejectedLeaves');
    Route::post('attendancesubmit',[HrController::class,'attendancesubmit'])->name('attendancesubmit');
    Route::get('FullAttendance',[HrController::class,'FullAttendance'])->name('FullAttendance');








});

Route::group(['middleware'=>'employee_auth'],function(){

    Route::get('EmployeeDashboard',[EmployeeController::class,'EmployeeDashboard'])->name('EmployeeDashboard');
    Route::get('EmployeeLeave',[EmployeeController::class,'EmployeeLeave'])->name('EmployeeLeave');
    Route::post('leavesubmit',[EmployeeController::class,'leavesubmit'])->name('leavesubmit');

    Route::get('LeaveHistory',[EmployeeController::class,'LeaveHistory'])->name('LeaveHistory');
    Route::get('EmployeeProject',[EmployeeController::class,'EmployeeProject'])->name('EmployeeProject');
    Route::get('LeaveHistory',[EmployeeController::class,'LeaveHistory'])->name('LeaveHistory');
    Route::get('Employeeprofile',[EmployeeController::class,'Employeeprofile'])->name('Employeeprofile');

    Route::post('EmployeeprofileUpdate',[EmployeeController::class,'EmployeeprofileUpdate'])->name('EmployeeprofileUpdate');
    Route::post('EmployeePasswordUpdate',[EmployeeController::class,'EmployeePasswordUpdate'])->name('EmployeePasswordUpdate');
    Route::post('updateprojectdetails/{p_id}',[EmployeeController::class,'updateprojectdetails'])->name('updateprojectdetails');



    Route::get('Employeelogout',[LoginCOntroller::class,'Employeelogout'])->name('Employeelogout');
    Route::get('leadingprojects',[EmployeeController::class,'leadingprojects'])->name('leadingprojects');
    Route::get('projectmember',[EmployeeController::class,'projectmember'])->name('projectmember');
    Route::get('updateprojectstatus/{p_id}',[EmployeeController::class,'updateprojectstatus'])->name('updateprojectstatus');


});
