<?php
use Illuminate\Support\Facades\Auth;
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
// Route::get('/', function(){
//   return view('welcome');
// });
//Route::get('/', 'CehController@index')->name('index');

Route::name('user.')->group(function(){
  Route::view('/private', 'private')->middleware('auth')->name('private');

  Route::get('/login', function(){
    if (Auth::check()){
      return redirect(route('user.private'));
    }
    return view('login');
  })->name('login');

  Route::post('/login', 'LoginController@login');

  Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('user.login'));
  })->name('logout');

  Route::get('/registration', function(){
    if (Auth::check()){
      return redirect(route('user.private'));
    }
    return view('registration');
  })->name('registration');

  Route::post('/registration', 'RegisterController@save');


});

Route::get('/sessions', 'CehController@sessions')->name('sessions');
Route::get('/sessions/{session}/delete', 'CehController@deleteSession')->name('deleteSession');//для удалить

Route::get('/sessions/{session}', 'CehController@session')->name('session');

//Route::get('/applications', 'CehController@applications')->name('applications');
Route::view('/applications', 'app')->name('applications');

// Route::get('/applications/planner', 'CehController@planner')->name('planner');
// //Route::('/applications/planner', 'CehController@...')->name('planner');//для завершить
// //Route::('/applications/planner', 'CehController@...')->name('planner');//для приостановить

Route::get('/applications/planner/inProduction', 'CehController@inProduction')->name('inProduction');
Route::post('/applications/planner/inProduction/{batch}/finish', 'CehController@finish')->name('finish');//для завершить
Route::post('/applications/planner/inProduction/{batch}/pause', 'CehController@pause')->name('pause');//для приостановить


Route::get('/applications/planner/toLaunch', 'CehController@toLaunch')->name('toLaunch');
Route::post('/applications/planner/toLaunch/{batch}/startToLaunch', 'CehController@startToLaunch')->name('startToLaunch');//для запустить

Route::get('/applications/planner/suspended', 'CehController@suspended')->name('suspended');
Route::post('/applications/planner/suspended/{batch}/startSuspended', 'CehController@startSuspended')->name('startSuspended');//для запустить

Route::get('/applications/planner/completed', 'CehController@plannerCompleted')->name('plannerCompleted');

// Route::get('/applications/master', 'CehController@master')->name('master');

Route::get('/applications/master/perform', 'CehController@perform')->name('perform');

Route::get('/applications/master/completed', 'CehController@masterCompleted')->name('masterCompleted');

Route::get('/applications/worker', 'CehController@worker')->name('worker');

Route::get('/sessions/{session}/export', 'CehController@export')->name('export');
