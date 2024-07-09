<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {

//    $route = auth()->check() 
//             ? 'dashboard' 
//             : 'login';

    return view('pages.landing.index');

});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('auth', 'auth')->name('auth')->middleware('guest');
    Route::post('logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:admin,asesor,asesi'])->group(function () {
    Route::get('dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');
    
    Route::resource('asesor', UserController::class);
    Route::resource('asesi', UserController::class);

    Route::get('profil', function () { return view('pages.profil.index'); });
    Route::get('formulir', function () { return view('pages.formulir.index'); });
    Route::get('jadwal', function () { return view('pages.jadwal.index'); });
    Route::get('kelas', function () { return view('pages.kelas.index'); });
});


