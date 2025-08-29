<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MasterController;


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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function () {
        return view('.login.login');
    });


//login
Route::get('/login', [LoginAuthController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [LoginAuthController::class, 'postLogin'])->name('postLogin');

    

});



Route::group(['middleware'=>['login_auth']],function(){

    //Main page
Route::get('/', [PagesController::class, 'home'])->name('home');


Route::get('/program-settings', [PagesController::class, 'programSettings'])->name('programSettings');

//folders
Route::get('/folders', [PagesController::class, 'folders'])->name('folders');

Route::get('/manageContent', [PagesController::class, 'manageContent'])->name('manageContent');
Route::post('/survey-visit/store', [PagesController::class, 'surveyStore'])->name('surveyStore');
Route::post('/college-extension/store', [PagesController::class, 'CollegeExtStore'])->name('CollegeExtStore');
Route::post('/areas/store', [PagesController::class, 'AreaStore'])->name('AreaStore');
Route::post('/parameters/store', [PagesController::class, 'ParameterStore'])->name('ParameterStore');

Route::get('/user-settings', [PagesController::class, 'users'])->name('users');


//logout
Route::get('/logout', [MasterController::class,'logout'])->name('logout');
});