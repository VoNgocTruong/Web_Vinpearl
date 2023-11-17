<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\CTHD;
use App\Models\Invoice;
use Mail;

class CartController extends Controller
{
    public function index() {
        return view('cart.index');
    }
    public function addToCart(Request $request) {
        $maDV = $request->input('maDV');
        $loaiVe = $request->input('loaiVe');
        $dichVu = DB::table('dich_vus')
            ->join('ves', 'dich_vus.maDV', '=', 'ves.maDV')
            ->where('dich_vus.maDV', $maDV)
            ->where('ves.loaiVe', $loaiVe)
            ->first();
        if(!$dichVu) {
            abort(404);
        }
        // Kiểm tra xem giỏ hàng đã tồn tại chưa, nếu chưa thì tạo mới
        $maVe = $dichVu->maVe;
        if(!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart');
        if (isset($cart[$maVe])) {
            $cart[$maVe]['quantity']++;
            if ($cart[$maVe]['quantity'] < 1) {
                $cart[$maVe]['quantity'] = 1;
            }
        } else {
            $cart[$maVe] = [
                'maDV' => $dichVu->maDV,
                'tenDV' => $dichVu->tenDV,
                'loaiVe' => $dichVu->loaiVe,
                'anh' => $dichVu->anh,
                'gia' => $dichVu->giaTien,
                'quantity' => 1,
            ];
        }
        Session::put('cart', $cart);
//        session()->forget('cart');
        return redirect()->route('cartIndex');
    }
    public function increaseQuantity(Request $request) {
        $cart = Session::get('cart');
        $maVe = $request->input('maVe');
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if(isset($cart[$maVe])) {
            // Tăng số lượng khi click vào icon +
            $cart[$maVe]['quantity']++;
        }
        Session::put('cart', $cart);
        return redirect()->route('cartIndex');
    }
    public function decreaseQuantity(Request $request) {
        $cart = Session::get('cart');
        $maVe = $request->input('maVe');
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không và số lượng lớn hơn 1 mới giảm
        if(isset($cart[$maVe]) && $cart[$maVe]['quantity'] > 1) {
            // Giảm số lượng khi click vào icon -
            $cart[$maVe]['quantity']--;
        }
        Session::put('cart', $cart);
        return redirect()->route('cartIndex');
    }
    public function removeItemFromCart(Request $request) {
        $cart = Session::get('cart');
        $maVe = $request->input('maVe');
        if (isset($cart[$maVe])) {
            unset($cart[$maVe]);
            session()->put('cart', $cart);
        }
        if (empty($cart)) {
            session()->forget('cart');
        }
        return redirect()->route('cartIndex');
    }
    
}