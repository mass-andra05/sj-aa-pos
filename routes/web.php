<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;

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

Route::group(['middleware' =>  'guest'], function(){
    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class,'postlogin'])->name('postlogin');
});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin,kasir']], function(){
    Route::get('/', function () {
        return view('dashboard');
    })->middleware('auth');

    route::get('/profil',[UserController::class,'profil'])->name('profil');   
    Route::patch('/update-password', [UserController::class,'updatePassword'])->name('update-password'); 
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){

    Route::resource('user', UserController::class);
    
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
});


