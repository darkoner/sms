<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();
Route::post('login', 'Auth\LoginController@authenticate')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('api/home/get_data_for_dashboard', 'HomeController@getDataForDashboard');
Route::post('api/home/change_client_approval_status', 'Client\ClientController@changeClientApprovalStatus');
Route::post('api/home/quote_review', 'Staff\StaffController@quoteReview');

Route::get('/profile/verify_email/{confirmationCode}', 'Email\EmailVerifyController@confirmEmail');

Route::namespace('Staff')->group(function ()
{
    /*ViewProfile*/
    Route::get('/staff_profile', 'StaffController@staffProfileView');
    Route::post('/api/staff_profile/get_all_details', 'StaffController@getStaffProfileDetails');
    Route::post('/api/staff_profile/save', 'StaffController@updateProfile');
    Route::post('/api/staff_profile/upload_pic', 'StaffController@uploadPic');
    Route::post('staff_profile/send_email_verify', 'StaffController@sendVerifyEmail');

    /*Add Staff*/
    Route::get('/add_', 'StaffController@addStaffView');
    Route::post('/api/add_staff/add_new_staff', 'StaffController@addNewStaff');

    /*Staff List*/
    Route::get('/staff_list', 'StaffController@staffListView');
    Route::get('/api/staff_list/get_all_staff', 'StaffController@getAllStaff');
    Route::post('/api/staff_list/change_user_status', 'StaffController@changeUserStatus');
});

Route::namespace('Settings')->group(function ()
{
    // Main Settings view
    Route::get('/settings', 'Settings@index');

    /*Change Password*/
    Route::get('/change_password', 'Security\ChangePasswordController@index');
    Route::get('/api/change_password/get_user_details', 'Security\ChangePasswordController@getUserDetails');
    Route::post('/api/change_password/change_user_password', 'Security\ChangePasswordController@changeUserPassword');

    /*Business*/
    Route::get('/settings_business', 'BusinessController@index');
    Route::get('/api/settings_business/get_all_details', 'BusinessController@getAllDetails');
    Route::post('/api/settings_business/update', 'BusinessController@update');
    Route::post('/api/settings_business/delete', 'BusinessController@delete');
    Route::post('/api/settings_business/upload', 'BusinessController@upload');
    Route::post('/api/settings_business/delete_attachment', 'BusinessController@removeAttachment');
});

Route::namespace('Student')->group(function ()
{
    /*ViewProfile*/

    /*Add Student*/
    Route::get('/add_student', 'StudentController@index');
    Route::get('/api/add_student/get_details', 'StudentController@getDetails');
    Route::post('/api/add_student/save_student_details', 'StudentController@addNewStudent');

    /*Student List*/
    Route::get('/student_list', 'StudentController@studentListView');
    Route::get('/api/student_list/get_all_student', 'StudentController@studentView');
    Route::post('/api/staff_list/change_user_status', 'StaffController@changeUserStatus');

    /*ViewProfile*/
    Route::get('/student_profile', 'StudentController@getProfileView');
    Route::post('/api/student_profile/get_profile_details', 'StudentController@getProfileDetails');
    Route::post('/api/student_profile/save', 'StudentController@updateProfileDetails');

});

Route::namespace('Faculty')->group(function ()
{
    /*Add Faculty*/
    Route::get('/add_faculty', 'FacultyController@index');
    Route::post('/api/add_faculty/save_faculty', 'FacultyController@addNewFaculty');

    /*Faculty List*/
    Route::get('/faculty_list', 'FacultyController@facultyListView');
    Route::get('/api/faculty_list/get_all_faculty', 'FacultyController@facultyView');

    /*ViewProfile*/
    Route::get('/faculty_profile', 'FacultyController@getProfileView');
    Route::post('/api/faculty_profile/get_profile_details', 'FacultyController@getProfileDetails');
    Route::post('/api/faculty_profile/save', 'FacultyController@updateProfileDetails');

});

Route::namespace('Course')->group(function ()
{
    Route::get('/course', 'CourseController@index');
    Route::get('/api/course/get_all_details', 'CourseController@getAllDetails');
    Route::post('/api/course/save', 'CourseController@save');
    Route::post('/api/course/delete', 'CourseController@delete');

});

Route::namespace('Semester')->group(function ()
{
    Route::get('/semester', 'SemesterController@index');
    Route::get('/api/semester/get_all_details', 'SemesterController@getAllDetails');
    Route::post('/api/semester/save', 'SemesterController@save');
    Route::post('/api/semester/delete', 'SemesterController@delete');

});

Route::namespace('Subject')->group(function ()
{
    Route::get('/subject', 'SubjectController@index');
    Route::get('/api/subject/get_all_details', 'SubjectController@getAllDetails');
    Route::post('/api/subject/save', 'SubjectController@save');
    Route::post('/api/subject/delete', 'SubjectController@delete');

});

Route::get('/profile/verify_email/{confirmationCode}', 'Email\EmailVerifyController@confirmEmail');

Route::namespace('Attendance')->group(function ()
{
    Route::get('/attendance_list', 'AttendanceController@index');
    Route::get('/api/attendance/get_all_details', 'AttendanceController@getAllDetails');
   

});