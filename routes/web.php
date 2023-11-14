<?php

use App\Http\Controllers\CthdController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiNhanVienController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SoCaController;
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
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    Route::resource('khach_hangs', KhachHangController::class);
});

Route::get('/', function () {
    return view('welcome');
});
