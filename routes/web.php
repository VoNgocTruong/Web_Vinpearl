<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\CthdController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiNhanVienController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SoCaController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\LoaiDichVuController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\SearchController;
use App\Models\Cthd;
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
    Route::resource('cthd', CthdController::class);
    Route::resource('khach_hangs', KhachHangController::class);
    Route::resource('loai_nhan_viens', LoaiNhanVienController::class);
    Route::resource('nhan_viens', NhanVienController::class);
    Route::resource('so_cas', SoCaController::class);
    Route::resource('loai_dich_vus', LoaiDichVuController::class);
    Route::resource('dich_vus', DichVuController::class);
    Route::resource('ves', VeController::class);
    Route::get('nhan-viens/export', [NhanVienController::class, 'export'])->name('nhan_viens.export');
    Route::get('loai-nhan-viens/export', [LoaiNhanVienController::class, 'export'])->name('loai_nhan_viens.export');
    Route::get('khach-hangs/export', [KhachHangController::class, 'export'])->name('khach_hangs.export');
    Route::get('loai-dich-vus/export', [LoaiDichVuController::class, 'export'])->name('loai_dich_vus.export');
    Route::get('dich-vus/export', [DichVuController::class, 'export'])->name('dich_vus.export');
});

Route::get('/', [DichVuController::class, 'homeIndex'])->name('index');
Route::get('/show/{maDV}', [DichVuController::class, 'showForCustomer'])->name('show');
Route::get('/search', [SearchController::class, 'index'])->name('search');

//Check login -> true: vào, false: thoát về home
Route::middleware('checkLogin')->group(function(){
    Route::get('profile', [ProfileUserController::class, 'showProfile'])->name('show-profile');
    Route::get('profile/edit', [ProfileUserController::class, 'edit'])->name('edit-profile');
    Route::post('profile', [ProfileUserController::class, 'profile'])->name('update-profile');
    Route::get('logout', [AuthManagerController::class, 'logout'])->name('logout');
    // cart route
    Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/cart/increase', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::post('/cart/decrease', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::post('/cart/remove', [CartController::class, 'removeItemFromCart'])->name('removeItemFromCart');
});
Route::get('register', [AuthManagerController::class, 'showRegistration'])->name('show-registration');
Route::post('register', [AuthManagerController::class, 'register'])->name('register');
Route::get('login', [AuthManagerController::class, 'showLogin'])->name('show-login');
Route::post('login', [AuthManagerController::class, 'login'])->name('login');
