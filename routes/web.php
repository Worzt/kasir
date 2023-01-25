<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\BarangController;
use app\Http\Controllers\indexcontroller;
use Faker\Guesser\Name;

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
    return view('index');
});

route::get('/register' , [authcontroller::class, 'register']);
route::post('/register', [authcontroller::class, 'regisuser'])->name('regis');

Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'loginin'])->name('loginuser');
Route::get('/logout', [authController::class, 'logout']);

//menu

route::get('/menu', [BarangController::class, 'index']);