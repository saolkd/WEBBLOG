<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StyleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome-laravel', function () {
    return view('welcome');
});
// Route::get('/ilham', function() {
//     echo "Saya Siswa";
// });
Route::get('/guru', function(){
    return view('guru');
});
Route::get('/data_guru', function(){
    return view('data_guru');
});          
Route::get('/data_siswa', function(){
    return view('data_siswa');
});
Route::get('/data_blog', function(){
    return view('data_blog');
});

Route::get('/', [BlogController::class, 'user']);

Route::resource('/admin/posts', BlogController::class)->middleware('cekLogin');

Route::resource('/admin/style', StyleController::class)->middleware('cekLogin');

Route::resource('/admin/about', AboutController::class)->middleware('cekLogin');

Route::get('/admin', [BlogController::class, 'dashboard'])->middleware('cekLogin');

Route::get('/about',[AboutController::class, 'about']);

Route::get('/style', [StyleController::class, 'style']);

Route::get('/contact', [ContactController::class, 'contact']);

Route::post('/send-message', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/tampil/{id}', [BlogController::class, 'tampil'])->name('tampil');

Route::get('/styles/{id}', [StyleController::class, 'styles'])->name('styles');


Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('cekUserLogin');

Route::post('/admin/login-proses', [LoginController::class, 'login'])->middleware('cekUserLogin');

// Route::get('/admin/register', [RegisterController::class, 'index']);

// Route::post('/admin/register-proses', [RegisterController::class, 'registerPost']);

Route::get('/admin/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-proses', [AuthController::class, 'registerPost'])->name('register-proses');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'loginPost'])->name('login-proses');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home2', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/privacy-policy', function(){
    return view('privacy_policy');
});