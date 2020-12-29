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
    return view('website.index');
})->name('index');

/*Auth::routes();*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/programmes', 'ProgrammesController@index')->name('programmes');
Route::get('/departments', 'departmentsController@index')->name('departments');
Route::get('/apply', 'ApplyController@index')->name('apply');
Route::post('/student_apply', 'ApplyController@studentApply')->name('student_apply');
Route::get('/application', 'DesktopController@index')->middleware('applicants_Role')->name('application');
Route::get('/student/{sect}', 'DesktopController@portal')->middleware('checkauth')->name('portal');
//Route::post('/applicant-login', 'LoginController@ApplicantLogin')->name('applicant-login');
Route::get('/login', 'LoginController@ApplicantLogin')->name('login');
Route::post('/login-auth', 'LoginController@ApplicantLoginAuth')->name('login-auth');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/payment_pdf', 'PdfController@instruction')->name('payment_pdf');
Route::post('/process_result', 'AllAjax@resultUpload')->name('process_result');
/*first registering result*/
Route::post('/add_result','AllAjax@addResult')->name('add_result');
//saving result data
Route::post('/process_result2','AllAjax@saveResult')->name('process_result2');
Route::post('/process_result3','AllAjax@savebio')->name('process_result3');
Route::post('/application','AllAjax@uploadImage')->name('process_result4');

