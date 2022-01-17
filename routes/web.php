<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/ListUser',[userController::class,'listUser']);
Route::get('admin/ListUser',[userController::class,'listUser'])->middleware('is_admin');
Route::get('AddUser', [userController::class,'addUser'])->middleware('is_admin');
Route::post('/save-user', [userController::class,'saveUser'])->middleware('is_admin');
Route::get('/EditUser/{id}', [userController::class,'editUser']);
Route::get('/deleteUser/{id}', [userController::class,'deleteUser'])->middleware('is_admin');
Route::get('/updateUser/{id}', [userController::class,'UpdateUser']);
