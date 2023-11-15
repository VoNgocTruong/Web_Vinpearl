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
    public function addToCart(Request $request) {
        $maDV = $request->input('maDV');
        $dichVu = DichVu::query()->find($maDV);
        if(!$dichVu) {
            abort(404);
        }
        // Kiểm tra xem giỏ hàng đã tồn tại chưa, nếu chưa thì tạo mới
        if(!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart');
        if (isset($cart[$maDV])) {
            // cho này sửa thành vé
            $cart[$maDV]['quantity']++;
            if ($cart[$maDV]['quantity'] < 1) {
                $cart[$maDV]['quantity'] = 1;
            }
        } else {
            $cart[$maDV] = [
                'tenDV' => $dichVu->tenDV,
                'quantity' => 1,
            ];
        }
        Session::put('cart', $cart);
//        return view('cart.index');
        $cart = session()->get('cart');
        dd($cart);
    }
}
