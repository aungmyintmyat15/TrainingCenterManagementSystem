<?php

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
Route::get('/master',function(){
    return view('layouts.master');
});
Route::get('/index', function () {
    return view('index');
});
Route::resource('/courses','CourseController');
Route::resource('/batches','BatchController');
Route::resource('/students','StudentController');
Route::resource('/attendences','AttendenceController');
Route::resource('/payments','PaymentController');
Route::resource('/expenses','ExpenseController');