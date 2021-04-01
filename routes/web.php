<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ImageController;

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


Route::get('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/patients', [PatientController::class,'index'])->name('patients');

Route::get('/patients/create', [PatientController::class,'newProfile'])->name('create.patient.profile');
Route::post('/patients/create', [PatientController::class,'store']);

Route::get('/patients/{patient:mykid}', [PatientProfileController::class,'index'])->name('patient.profile');

Route::get('/patients/{patient:mykid}/image/{image:id}', [ImageController::class,'show'])->name('images');
Route::delete('/patients/{patient:mykid}/image/{image:id}/', [ImageController::class,'destroy'])->name('deleteImage');

Route::get('/patients/edit/{patient:mykid}', [PatientProfileController::class,'edit'])->name('edit.patient.profile');
Route::post('/patients/edit/{patient:mykid}', [PatientProfileController::class,'update']);

Route::get('/patients/{patient:mykid}/post', [PostController::class,'index'])->name('posts');
Route::post('/patients/{patient:mykid}/post', [PostController::class,'store']);
Route::delete('/patients/{patient:mykid}/post/{post:id}', [PostController::class,'destroy'])->name('deletepost');
Route::post('/patients/{patient:mykid}/post/{post:id}/edit', [PostController::class,'update'])->name('updatepost');

Route::get('/therapists', [TherapistController::class,'index'])->name('therapists');


Route::get('/', function () {
return view('welcome');
});
