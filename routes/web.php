<?php

use App\Http\Controllers\CthdController;
use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoaDonController;
use App\Models\HoaDon;

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
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    Route::resource('khach_hangs', KhachHangController::class);
    Route::resource('cthd', CthdController::class);
    Route::resource('hoadon/show', HoaDonController::class);
});



Route::get('/', function () {
    return view('welcome');
});
