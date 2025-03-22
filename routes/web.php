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

 
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ["auth" ]], function () {

    
    Route::resource('branch', 'App\Http\Controllers\BranchesController');
    Route::resource('academy','App\Http\Controllers\AcademyController');
    Route::resource('sport', 'App\Http\Controllers\SportController');
    Route::resource('student', 'App\Http\Controllers\StudentController');
    Route::resource('payment', 'App\Http\Controllers\PaymentController');
    Route::resource('programs', 'App\Http\Controllers\ProgramsController');
    Route::resource('uniform', 'App\Http\Controllers\UniformController');
    Route::resource('admins', 'App\Http\Controllers\AdminsController');
    Route::resource('evaluation', 'App\Http\Controllers\EvaluationController');

    Route::get('/get_academy/{branch_id}', 'App\Http\Controllers\ReportController@getAcademyByBranch')->name('get_academy');
    Route::get('report', 'App\Http\Controllers\ReportController@index');
    Route::post('totalincome', 'App\Http\Controllers\ReportController@getTotalIncome')->name('totalincome');



    Route::get('uniformreport', 'App\Http\Controllers\ReportController@uniformreport');

    Route::post('uniformincom', 'App\Http\Controllers\ReportController@uniformincom');



    Route::get('statusreport', 'App\Http\Controllers\ReportController@statusreport');

    Route::post('statustotal', 'App\Http\Controllers\ReportController@statustotal');






    Route::get('programreport', 'App\Http\Controllers\ReportController@programreport');
    Route::post('programreport', 'App\Http\Controllers\ReportController@programdata')->name('programdata');



    Route::get('get-academy/{id}', 'App\Http\Controllers\ReportController@getAcademy');
    Route::get('get-program/{id}', 'App\Http\Controllers\ReportController@getProgram');




    Route::get('scan', 'App\Http\Controllers\QrCodeController@scan');
    Route::post('scansave', 'App\Http\Controllers\QrCodeController@scansave')->name('scansave');


     
    });
     
  

    Route::post('result', 'App\Http\Controllers\ProfileController@profile');




 
Route::get('/clear-cache', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully";
});
 

 
Route::get('profile', function () {
    return view('profile.login');
 });




 
