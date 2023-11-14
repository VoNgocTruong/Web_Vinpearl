<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        return view('cart.index');
    }
    public function addToCart($id) {
        $dichVu = DichVu::query()->find($id);
        if(!$dichVu) {
            abort(404);
        }
        // Kiểm tra xem giỏ hàng đã tồn tại chưa, nếu chưa thì tạo mới
        if(!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart');
        
    }
}
