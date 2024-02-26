<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::get('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(DataController::class)->group(function(){
    Route::get('/addClub', 'addClub')->name('addClub');
    Route::post('/storeClub', 'storeClub')->name('storeClub');
    Route::get('/addClubScores', 'addClubScores')->name('addClubScores');
    Route::post('/storeMatch', 'storeMatch')->name('storeMatch');
    Route::get('/viewTable', 'viewTable')->name('viewTable');
});