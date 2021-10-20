<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfessionalController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'histo', 'as' =>'histo.'],function(){
	Route::get('index', [HistoryController::class,'index'])->name('index');
	Route::get('create', [HistoryController::class,'create'])->name('create');
	Route::post('store',[HistoryController::class,'store'])->name('store');
	Route::delete('destroy/{histo}',[HistoryController::class,'destroy'])->name('destroy');
});
Route::group(['prefix'=>'professional', 'as' =>'professional.'],function(){
	Route::get('index', [ProfessionalController::class,'index'])->name('index');
	Route::get('create', [ProfessionalController::class,'create'])->name('create');
	Route::post('store',[ProfessionalController::class,'store'])->name('store');
	Route::delete('destroy/{professional}',[ProfessionalController::class,'destroy'])->name('destroy');
});
Route::group(['prefix'=>'patient', 'as' =>'patient.'],function(){
	Route::get('index', [PatientController::class,'index'])->name('index');
	Route::get('create', [PatientController::class,'create'])->name('create');
	Route::post('store', [PatientController::class,'store'])->name('store');
	Route::delete('destroy/{patient}',[PatientController::class,'destroy'])->name('destroy');

});



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

