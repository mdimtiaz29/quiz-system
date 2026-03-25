<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Middleware\Checkuserauth;
use App\Http\Middleware\Checkadminauth;
use App\Http\Middleware\Checkactive_status;
// Route::get('/', function () {
//     return view('welcome');
// });
//Route::view('/','welcome');
Route::get('/',[Usercontroller::class,'getcategory']);
Route::get('/user-quiz-list/{id}/{name}',[Usercontroller::class,'quizlistuser'])->middleware([Checkuserauth::class]);
Route::view('/usersignup','user-signup');
Route::post('/usersignup',[Usercontroller::class,'user_signup']);
Route::get('/start-quiz/{id}/{name}',[Usercontroller::class,'start_quiz'])->middleware([Checkuserauth::class]);
Route::get('/userlogout',[Usercontroller::class,'logout'])->middleware([Checkuserauth::class]);
Route::get('/sign_log',[Usercontroller::class,'usersignlog']);
Route::view('/userlogin','user-login');
Route::post('/userlogin',[Usercontroller::class,'user_login']);
Route::get('/mcq/{id}/{name}',[Usercontroller::class,'mcq'])->middleware([Checkuserauth::class]);
Route::post('/mcq-result/{id}',[Usercontroller::class,'submitnext'])->middleware([Checkuserauth::class]);
Route::get('/user-details/{id}',[Usercontroller::class,'Userdetails'])->middleware([Checkuserauth::class]);
Route::get('/searchQuiz',[Usercontroller::class,'searchquiz']);
Route::get('/verify-link/{email}',[Usercontroller::class,'user_Verify']);
Route::view('/forgot','forgot-password-email');
Route::post('/forget',[Usercontroller::class,'user_forget']);
Route::get('/verify-forgot-email/{email}',[Usercontroller::class,'userForgot']);
Route::view('/reset-password','reset-password');
Route::post('/update_password',[Usercontroller::class,'updatePassword']);
Route::get('/category-top-list',[Usercontroller::class,'categoriestop']);
Route::get('/complete_quiz',[Usercontroller::class,'certificate']);
Route::get('/edit_profile/{id}',[Usercontroller::class,'edit']);
Route::put('/edit',[Usercontroller::class,'uploadinfo']);


Route::view('adminlogin','adminlogin');
Route::post('login',[Admincontroller::class,'login']);
Route::get('dashboard',[Admincontroller::class,'dashboard'])->middleware([Checkadminauth::class]);
Route::view('admin','admin')->middleware([Checkadminauth::class]);
Route::get('category',[Admincontroller::class,'categories'])->middleware([Checkadminauth::class]);

Route::get('logout',[Admincontroller::class,'logout']);
Route::post('addcategory',[Admincontroller::class,'addcategory'])->middleware([Checkadminauth::class]);
Route::get('category/delete/{id}', [Admincontroller::class, 'deleteCategory'])->middleware([Checkadminauth::class]);
Route::get('/add-quiz', [Admincontroller::class, 'addquiz'])->middleware([Checkadminauth::class]);
Route::post('/add-mcq',[Admincontroller::class, 'addmcq'])->middleware([Checkadminauth::class]);
Route::get('show-mcq/{id}',[Admincontroller::class, 'showmcq'])->middleware([Checkadminauth::class]);
Route::get('/quiz-list/{id}/{name}',[Admincontroller::class, 'quizlist'])->middleware([Checkadminauth::class]);
Route::get('/mcq-list/{id}',[Admincontroller::class, 'mcqlist'])->middleware([Checkadminauth::class]);
Route::get('user-activity/{id}',[Admincontroller::class, 'activate'])->middleware([Checkadminauth::class]);