<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\AsessorController;
use App\Http\Controllers\AsessionController;
use App\Http\Controllers\ScheduleController;

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

Route::middleware(['auth', 'role:Admin,Asesor,Asesi'])->group(function () {
    Route::get('dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');

    Route::resource('asession', AsessionController::class);
    Route::resource('asessor', AsessorController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('schema', SchemaController::class);
    Route::resource('users', UserController::class);

    Route::get('profil', function () { return view('pages.profil.index'); });
    Route::get('formulir', function () { return view('pages.formulir.index'); });
    Route::get('jadwal', function () { return view('pages.jadwal.index'); });
    Route::get('kelas', function () { return view('pages.kelas.index'); });
});


