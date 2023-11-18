<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManagerController extends Controller
{
    //Register
    public function showRegistration(){
        return view('authenticate.registration');
    }
    function register(Request $request){
        $email = request()->input('email');

    // Kiểm tra email đã có trong database chưa
        if (KhachHang::where('email', $email)->exists()) {
            // Email đã tồn tại
            return redirect()->back()->with('exist-email', 'Email này đã tồn tài! Hãy sử dụng email khác.');
        }
        else{
            $user = new User();
            $khachHang = new KhachHang();
            $request->validate([
                'password' => 'min:8',
                'confirm' => 'same:password',
            ], [
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'confirm.same' => 'Mật khẩu xác nhận không đúng. Vui lòng thử lại',
            ]);
            $password = bcrypt($request->password);
            $lastCustomer = KhachHang::query()->orderBy('maKH', 'desc')->first();
            if ($lastCustomer) {
                $lastCode = $lastCustomer->maKH;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format mã khách hàng và gán vào model
            $khachHang->maKH = 'KH' . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);
            $khachHang->hoTenKH = $request->name;
            $khachHang->email = $request->email;
            $khachHang->matKhau = $password;
            $khachHang->save();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $password;
            $user->save();
            return redirect()->route('show-login')->with('register-successfully', 'Đăng ký thành công!');
        }
    }

    //Login
    public function showLogin(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('authenticate.login');
    }
    function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->matKhau])){
            $request->session()->put('email', $request->email);
            return redirect()->route('index')->with('login-checked', 'Đăng nhập thành công!');
        }
        return redirect()->route('show-login')->with('login-failed', 'Email hoặc Mật khẩu không đúng!');
    }

    //Profile


    //Logout
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
