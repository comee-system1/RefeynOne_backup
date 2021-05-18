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

//ログインしている時のみ入れる
Route::prefix('lss-admin')->namespace('admin')->as('admin.')->middleware('auth')->group(function() {
    Route::get('/', [\App\Http\Controllers\Admin\indexController::class, 'index'])->name('admin.login');

});
