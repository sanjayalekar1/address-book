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

Route::get('/add-contact', [App\Http\Controllers\AddressController::class, 'create'])->name('add-contact');
Route::post('/insert-contact', [App\Http\Controllers\AddressController::class, 'store'])->name('insert-contact');
Route::get('/edit-contact/{id}', [App\Http\Controllers\AddressController::class, 'edit'])->name('edit-contact');
Route::patch('/update-contact', [App\Http\Controllers\AddressController::class, 'update'])->name('update-contact');
Route::get('/delete-contact/{id}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('delete-contact');
Route::get('exporttoexcel', [App\Http\Controllers\AddressController::class, 'exporttoExcel'])->name('exporttoexcel');
Route::get('exporttocsv', [App\Http\Controllers\AddressController::class, 'exporttoCSV'])->name('exporttocsv');
