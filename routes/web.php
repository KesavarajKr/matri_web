<?php

use App\Http\Controllers\aboutmeController;
use App\Http\Controllers\basicdetailsController;
use App\Http\Controllers\bioController;
use App\Http\Controllers\cashfreeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactviewController;
use App\Http\Controllers\DailysuggestionController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\favouriteController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\myprofileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ProfessionalController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\registerController;
use App\Http\Controllers\religionController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VideoController;
use Symfony\Component\Mime\Header\MailboxHeader;

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
Route::view('privacy-policy','pages.privacypolicy');
Route::view('login-otp','pages.loginotp');

Route::Post('login',[LoginController::class,'authenticate']);
Route::post('postData',[registerController::class,'passData']);
Route::post('otpcheck',[registerController::class,'otpcheck']);
Route::get('getbasicdetails',[registerController::class,'getbasicdetails']);

// Route::get('register',[registerController::class,'getData']);

Route::resource('register',registerController::class);
Route::resource('basicdetails',basicdetailsController::class)->middleware('shareAuth','percentage');
Route::get('logout',[LoginController::class,'logout']);
Route::post('loginotp',[LoginController::class,'loginotp']);
Route::post('logotpcheck',[LoginController::class,'logotpcheck']);



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

Route::post('addReport',[bioController::class,'addReport']);




Route::resource('religion',religionController::class)->middleware('shareAuth');

Route::resource('family',FamilyController::class)->middleware('shareAuth');

Route::resource('horoscope',HoroscopeController::class)->middleware('shareAuth');

Route::resource('location',LocationController::class)->middleware('shareAuth');

Route::resource('professional',ProfessionalController::class)->middleware('shareAuth');

Route::resource('video',VideoController::class)->middleware('shareAuth');

Route::resource('preference',PreferenceController::class)->middleware('shareAuth');

Route::resource('image',ImageController::class)->middleware('shareAuth');

Route::resource('aboutme',aboutmeController::class)->middleware('shareAuth');

Route::resource('myprofile',myprofileController::class)->middleware('shareAuth');

Route::resource('matches',MatchesController::class)->middleware('shareAuth');

Route::resource('bio',bioController::class)->middleware('shareAuth');

Route::resource('search',searchController::class)->middleware('shareAuth');

Route::resource('settings',settingsController::class)->middleware('shareAuth');

Route::resource('vendor',VendorController::class)->middleware('shareAuth');

Route::resource('favourite',favouriteController::class)->middleware('shareAuth');

Route::resource('package',PackageController::class)->middleware('shareAuth');

Route::resource('mailbox',MailboxController::class)->middleware('shareAuth');

Route::resource('home',HomepageController::class)->middleware('shareAuth');

Route::get('premiummatches',[MatchesController::class,'premiumMatches'])->middleware('shareAuth');

Route::get('newmatches',[MatchesController::class,'newmatches'])->middleware('shareAuth');

Route::get('mutualmatches',[MatchesController::class,'mutualmatches'])->middleware('shareAuth');

Route::get('locationmatches',[MatchesController::class,'locationmatches'])->middleware('shareAuth');

Route::get('professionalmatches',[MatchesController::class,'professionalmatches'])->middleware('shareAuth');

Route::get('starmatches',[MatchesController::class,'starmatches'])->middleware('shareAuth');

Route::get('educationmatches',[MatchesController::class,'educationmatches'])->middleware('shareAuth');



Route::get('whoviewprofiles',[MatchesController::class,'whoviewprofiles'])->middleware('shareAuth');

Route::get('myviewedhistory',[MatchesController::class,'myviewedhistory'])->middleware('shareAuth');

Route::POST('addFavourite',[favouriteController::class,'addFavourite'])->middleware('shareAuth');

Route::post('sendproposal',[bioController::class,'sendproposal'])->middleware('shareAuth');

Route::post('searchresult',[searchController::class,'searchresult'])->middleware('shareAuth');

Route::post('photoprivacy',[settingsController::class,'photoprivacy'])->middleware('shareAuth');

Route::post('contactprivacy',[settingsController::class,'contactprivacy'])->middleware('shareAuth');

Route::post('bioprivacy',[settingsController::class,'bioprivacy'])->middleware('shareAuth');

Route::post('horoscopeprivacy',[settingsController::class,'horoscopeprivacy'])->middleware('shareAuth');

Route::post('searchvaranid',[searchController::class,'searchvaranid'])->middleware('shareAuth');

Route::post('userpaymentreq',[PackageController::class,'userpaymentreq'])->middleware('shareAuth');


Route::view('paymentresponse','pages.paymentresponse');

Route::resource('redirect_url',cashfreeController::class)->middleware('shareAuth');

Route::resource('mailbox_contact',ContactviewController::class)->middleware('shareAuth');

Route::resource('chat',ChatController::class)->middleware('shareAuth');

Route::resource('dailymatches',DailysuggestionController::class)->middleware('shareAuth');

Route::post('redirectpage',[cashfreeController::class,'redirectpage'])->middleware('shareAuth');


Route::get('receivedinterest',[MailboxController::class,'receivedinterest'])->middleware('shareAuth');
Route::post('acceptinterest',[MailboxController::class,'acceptinterest'])->middleware('shareAuth');
Route::post('rejectinterest',[MailboxController::class,'rejectinterest'])->middleware('shareAuth');

Route::get('sendinterest',[MailboxController::class,'sendinterest'])->middleware('shareAuth');
Route::post('cancelinterest',[MailboxController::class,'cancelinterest'])->middleware('shareAuth');

Route::post('hideprofile',[settingsController::class,'hideprofile'])->middleware('shareAuth');

Route::post('deleteprofile',[settingsController::class,'deleteprofile'])->middleware('shareAuth');

Route::post('storechat',[ChatController::class,'storechat'])->middleware('shareAuth');

Route::post('getchat/{partnerid}/{sessionid}',[ChatController::class,'getchat'])->middleware('shareAuth');


Route::post('updatenumuserpackage',[bioController::class,'updatenumuserpackage'])->middleware('shareAuth');
Route::post('insertrequest',[bioController::class,'insertrequest'])->middleware('shareAuth');

Route::post('acceptcontactview',[settingsController::class,'acceptcontactview'])->middleware('shareAuth');
Route::post('rejectcontactview',[settingsController::class,'rejectcontactview'])->middleware('shareAuth');

