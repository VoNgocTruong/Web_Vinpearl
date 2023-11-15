<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    public function vnpay_payment() {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://web_vinpearl.test/cart";
        $vnp_TmnCode = "DHGJ60RR";//Mã website tại VNPAY 
        $vnp_HashSecret = "KGKXNSVIPRACQPUSZERFLUJVRUBIHOVB"; //Chuỗi bí mật

        $vnp_TxnRef = '1234'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh Toán Vé';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,          
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            }
}
