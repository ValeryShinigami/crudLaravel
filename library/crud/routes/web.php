<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('logout',function()
{
    Auth::logout();
    Session::flush();
    return redirect()->route('login');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/book/index', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.book.index');
Route::get('/admin/book/create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.book.create');
Route::post('/admin/book/store', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.book.store');
