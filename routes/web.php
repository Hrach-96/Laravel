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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/CardInfo',[App\Http\Controllers\CardController::class, 'CardInfo'])->name('CardInfo');

Route::post('/CreateCard',[App\Http\Controllers\CardController::class, 'create'])->name('CreateCard');

Route::post('/ChangeList',[App\Http\Controllers\CardController::class, 'changeList'])->name('ChangeList');

Route::post('/MemberAdd',[App\Http\Controllers\CardMembersController::class, 'create'])->name('MemberAdd');

Route::post('/MemberRemove',[App\Http\Controllers\CardMembersController::class, 'remove'])->name('MemberRemove');

Route::post('/AddComment',[App\Http\Controllers\CommentsController::class, 'create'])->name('AddComment');