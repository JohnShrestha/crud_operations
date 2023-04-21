<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\StudentController;

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

Route::group(['prefix' => 'form', 'as' => 'student.'], function(){
    Route::get('/index',                [App\Http\Controllers\CMS\StudentController::class,'index'])->name('index');
    Route::get('/create',               [App\Http\Controllers\CMS\StudentController::class,'create'])->name('create');
    Route::post('/store',               [App\Http\Controllers\CMS\StudentController::class,'store'])->name('store');
    Route::get('delete/{id}',           [App\Http\Controllers\CMS\StudentController::class,'remove'])->name('delete');
    Route::get('edit/{id}',              [App\Http\Controllers\CMS\StudentController::class,'edit'])->name('edit');
    Route::post('update-data/{id}',       [App\Http\Controllers\CMS\StudentController::class,'update'])->name('update');

});



?>

