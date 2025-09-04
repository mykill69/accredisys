<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LevelFileController;
use Illuminate\Support\Facades\Log;

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

// Guest route for viewing a single program (no login needed)
Route::get('/guest/program/{token}', [GuestController::class, 'guestProgram'])
    ->name('guestProgram');

Route::post('/guest/program/{token}/verify', [GuestController::class, 'verifyGuestCode'])
    ->name('verifyGuestCode');

Route::get('/guest/program/{token}/areas/{areaId}', [GuestController::class, 'guestProgramAreas'])
    ->name('guest.program.areas');

});



Route::group(['middleware'=>['login_auth']],function(){
//logout
Route::get('/logout', [LoginAuthController::class,'logout'])->name('logout');
    //Main page
Route::get('/', [PagesController::class, 'home'])->name('home');

// Folder 
Route::get('/program-settings', [ProgramController::class, 'programSettings'])->name('programSettings');
Route::post('/folders/store', [ProgramController::class, 'storeFolder'])->name('storeFolder');

// Subfolder routes
Route::get('/folders/{id}', [ProgramController::class, 'showFolder'])->name('showFolder');
Route::post('/folders/{id}/subfolders/store', [ProgramController::class, 'storeSubFolder'])->name('storeSubFolder');
Route::get('/subfolders/{id}', [ProgramController::class, 'showSubFolder'])->name('showSubFolder');
Route::post('/subfolders/{id}/programs/store', [ProgramController::class, 'storeProgram'])->name('storeProgram');
Route::put('/programs/{id}/update', [ProgramController::class, 'updateProgram'])->name('updateProgram');

// Program detail
Route::get('/programs/{id}', [ProgramController::class, 'showProgram'])->name('showProgram');

// Program areas (all areas + parameters for a program)
Route::get('/program-areas/{programId}/area/{areaId}', [AreaController::class, 'show'])
    ->name('program.areas');



Route::post('/parameters/{parameter}/files', [AreaController::class, 'store']);
Route::post('/parameters/files/upload-multiple', [AreaController::class, 'storeMultiple']);
Route::delete('/files/{id}', [AreaController::class, 'destroy'])->name('files.destroy');
Route::put('/files/{id}', [AreaController::class, 'update'])->name('files.update');

// level Folders
Route::get('/level-folders', [AreaController::class, 'levelFolders'])->name('levelFolders');

// Upload multiple
Route::post('/level-folders/files/upload-multiple', [LevelFileController::class, 'storeMultiple']);

// Update / Delete
Route::delete('/level-files/{id}', [LevelFileController::class, 'destroy'])->name('level.files.destroy');
Route::put('/level-files/{id}', [LevelFileController::class, 'update'])->name('level.files.update');

//folders
Route::get('/folders', [PagesController::class, 'folders'])->name('folders');

Route::get('/manageContent', [PagesController::class, 'manageContent'])->name('manageContent');
Route::post('/survey-visit/store', [PagesController::class, 'surveyStore'])->name('surveyStore');
Route::post('/college-extension/store', [PagesController::class, 'CollegeExtStore'])->name('CollegeExtStore');
Route::post('/areas/store', [PagesController::class, 'AreaStore'])->name('AreaStore');
Route::post('/parameters/store', [PagesController::class, 'ParameterStore'])->name('ParameterStore');

Route::get('/user-settings', [PagesController::class, 'users'])->name('users');



});