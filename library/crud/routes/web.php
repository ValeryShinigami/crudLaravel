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
Route::get('/user/index', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.index');

Route::get('/admin/books/index', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.books.index');
Route::get('/admin/books/create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.books.create');
Route::post('/admin/books/store', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.books.store');
Route::get('/admin/books/edit/{id}', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('admin.books.edit');
Route::patch('/admin/books/update/{id}', [App\Http\Controllers\Admin\BookController::class, 'update'])->name('admin.books.update');
Route::delete('/admin/books/delete/{id}', [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('admin.books.delete');