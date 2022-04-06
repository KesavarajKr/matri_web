<?php

use App\Http\Controllers\aboutmeController;
use App\Http\Controllers\basicdetailsController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\myprofileController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ProfessionalController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\registerController;
use App\Http\Controllers\religionController;
use App\Http\Controllers\VideoController;

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
    return view('pages.home');
});

// Route::view('register','pages.register');
Route::view('otp','pages.otp');
Route::view('login','pages.login');
Route::view('aboutme','pages.aboutme')->middleware('shareAuth');
Route::view('basicdetails','pages.basicdetails');
Route::view('religion','pages.religion');
Route::view('images','pages.images');
Route::view('forgott','pages.forgott');
Route::view('forgott_otp','pages.forgott_otp');
Route::view('myprofile','pages.myprofile');

Route::Post('login',[LoginController::class,'authenticate']);
Route::post('postData',[registerController::class,'passData']);
Route::post('otpcheck',[registerController::class,'otpcheck']);
Route::get('getbasicdetails',[registerController::class,'getbasicdetails']);

// Route::get('register',[registerController::class,'getData']);

Route::resource('register',registerController::class);
Route::resource('basicdetails',basicdetailsController::class)->middleware('shareAuth','percentage');
Route::get('logout',[LoginController::class,'logout']);



Route::post('storeaboutme',[aboutmeController::class,'storeaboutme']);
Route::post('updatebasicdetails',[basicdetailsController::class,'updatebasicdetails']);
Route::post('updatereligion',[religionController::class,'updatereligion']);
Route::post('updatefamilydetails',[FamilyController::class,'updatefamilydetails']);
Route::post('updatehoroscopedetails',[HoroscopeController::class,'updatehoroscopedetails']);
Route::post('updatelocationdetails',[LocationController::class,'updatelocationdetails']);
Route::post('updateprofessionaldetails',[ProfessionalController::class,'updateprofessionaldetails']);
Route::post('updatepreference',[PreferenceController::class,'updatepreference']);
Route::post('uploadimage',[ImageController::class,'uploadimage']);
Route::post('uploadvideo',[ImageController::class,'uploadvideo']);
Route::post('uploadhoroscope',[ImageController::class,'uploadhoroscope']);
Route::post('forgottcheck',[registerController::class,'forgottcheck']);
Route::post('forgottotpcheck',[registerController::class,'forgottotpcheck']);
Route::post('updatepassword',[registerController::class,'updatepassword']);



Route::resource('religion',religionController::class)->middleware('shareAuth');

Route::resource('family',FamilyController::class)->middleware('shareAuth');

Route::resource('horoscope',HoroscopeController::class)->middleware('shareAuth');

Route::resource('location',LocationController::class)->middleware('shareAuth');

Route::resource('professional',ProfessionalController::class)->middleware('shareAuth');

Route::resource('preference',PreferenceController::class)->middleware('shareAuth');

Route::resource('image',ImageController::class)->middleware('shareAuth');

Route::resource('aboutme',aboutmeController::class)->middleware('shareAuth');

Route::resource('myprofile',myprofileController::class)->middleware('shareAuth');



