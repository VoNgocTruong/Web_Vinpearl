<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->back()->with('exist-email', 'This email is already exist.');
        }
        else{
            $user = new User();
            $khachHang = new KhachHang();

            $request->validate([
                'password' => 'min:8',
                'confirm' => 'same:password',
            ], [
                'password.min' => 'At least 8 characters password!',
                'confirm.same' => 'Your retype-password is not correct!',
            ]);
            if($request->confirm != $request->password){
                return redirect()->back()->with('confirm', 'Confirm password is not correct!');
            }
            else{
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
                return redirect()->route('show-login')->with('register-successfully', 'Successful registration!');
            }
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
            return redirect()->route('index')->with('login-checked', 'Login successful');
        }
        
        return redirect()->route('show-login')->with('login-failed', 'Email or password are not correct!');
    }

    //Profile
    

    //Logout
    function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
