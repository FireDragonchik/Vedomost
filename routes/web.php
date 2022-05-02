<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonalAccountController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;

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
    return view('home');
});
Route::get('/home', function (){
    return view('home');
})->name('home');
Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/personalAccount', [PersonalAccountController::class, 'index'])->name('personalAccount');
Route::get('/personalAccountInfo', [PersonalAccountController::class, 'getUser'])->name('personalAccountInfo');
Route::get('/report', [ReportController::class, 'index'])->name('report');;



Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function (){
        return view('dashboard');
    });
});
