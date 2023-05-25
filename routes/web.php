<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

// Route pelawat
Route::get('/', function () {
    return redirect('login');
});

// Route authentication
Route::get('login', fn() => view('auth.login'))->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Route selepas login
Route::middleware('auth')->group(function() {
// Bahagian User
Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('articles', ArticleController::class);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Bahagian pengurusan / admin
//Route::resource('users', UserController::class)->middleware('check.admin');

});

//CRUD manually
//Route::get('/users/add', [UserController::class, 'create']);
//Route::post('/users/add', [UserController::class, 'store']);

//Sekiranya nak gunakan crud yang tertentu sahaja
//Route::resource('users', UserController::class)->only((['create', 'store', 'show']));

//sekiranya taknak guna variable show je.
//Route::resource('users', UserController::class)->except('show');

//CRUD auto function bila kita dah create file melalui terminal
Route::resource('users', UserController::class);

//kalo taknak run kod dalam terminal
Route::get('run-job', function () {
    Artisan::call('queue:work', ['--stop-when-empty' => true]);
    return nl2br(Artisan::output());
});


