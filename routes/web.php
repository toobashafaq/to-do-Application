<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
Route::post('/inserttask',[TaskController::class,'addTask'])->name('inserttask');
Route::get('/',[TaskController::class,'index']);


Route::get('show',[TaskController::class,'showAllTask']);

Route::get('deleteTask/{id}',[TaskController::class,'deleteTask'])->name('deleteTask');
Route::get('updateTask',[TaskController::class,'updateTask'])->name('updateTask');

