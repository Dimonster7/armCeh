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

Route::prefix('sessions')->group(function(){
  Route::get('', 'CehController@sessions')->name('sessions');
  Route::post('{session}/delete', 'CehController@deleteSession')->name('deleteSession');
  Route::get('{session}', 'CehController@session')->name('session');
  Route::get('{session}/export', 'CehController@export')->name('export');

  Route::prefix('{session}/applications')->group(function(){
    Route::post('', 'CehController@app')->name('applications');

    Route::prefix('planner')->group(function(){
      Route::get('inProduction', 'CehController@inProduction')->name('inProduction');
      Route::post('inProduction/{batch}/finish', 'CehController@finish')->name('finishProduction');
      Route::post('suspended/{batch}/finish', 'CehController@finish')->name('finishSuspended');
      Route::post('inProduction/{batch}/pause', 'CehController@pause')->name('pause');
      Route::get('toLaunch', 'CehController@toLaunch')->name('toLaunch');
      Route::post('toLaunch/{batch}/start', 'CehController@start')->name('startToLaunch');
      Route::get('suspended', 'CehController@suspended')->name('suspended');
      Route::post('suspended/{batch}/start', 'CehController@start')->name('startSuspended');
      Route::get('completed', 'CehController@plannerCompleted')->name('plannerCompleted');
    });

    Route::prefix('master')->group(function(){
      Route::get('perform', 'CehController@perform')->name('perform');
      Route::get('completed', 'CehController@masterCompleted')->name('masterCompleted');
      Route::post('perform/{task}/finishTask', 'CehController@finishTask')->name('finishTaskMaster');
      Route::post('perform/{task}/comment', 'CehController@comment')->name('commentMaster');
      Route::post('perform/{task}/suspendwork', 'CehController@changeProgressAndStatus')->name('suspendworkMaster');
      Route::post('perform/{id}/resumework', 'CehController@resumework')->name('resumeworkMaster');
    });

    Route::prefix('worker')->group(function(){
      Route::get('', 'CehController@worker')->name('worker');
      Route::post('{task}/finishTask', 'CehController@finishTask')->name('finishTaskWorker');
      Route::post('{task}/comment', 'CehController@comment')->name('commentWorker');
      Route::post('{task}/suspendwork', 'CehController@changeProgressAndStatus')->name('suspendworkWorker');
      Route::post('{id}/resumework', 'CehController@resumework')->name('resumeworkWorker');
    });
  });
});
