<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class ProfileUserController extends Controller
{
    public function showProfile(Request $request){
        $gender = 'Nam';
        if(Auth::user()->admin == 1){
            $user = User::find(auth()->id());
            return view('profile.profile', [
                'user' => $user,
                'name' => $user->name,
                'gender' => ''
            ]);
        }
        else{
            $user = KhachHang::where('email', $request->user()->email)->first();
            if($user->gioiTinh == 0) $gender = 'Nữ';
            return view('profile.profile', [
                'user' => $user,
                'name' => $user->hoTenKH,
                'gender' => $gender
            ]);
        }
        
        
        
    }
    public function edit(Request $request){
        $gender = 'Nam';
        if(Auth::user()->admin == 1){
            $user = User::find(auth()->id());
            return view('profile.edit', [
                'user' => $user,
                'name' => $user->name,
                'gender' => ''
            ]);
        }
        else{
            $user = KhachHang::where('email', $request->user()->email)->first();
            if($user->gioiTinh == 0) $gender = 'Nữ';
            return view('profile.edit', [
                'user' => $user,
                'name' => $user->hoTenKH,
                'gender' => $gender
            ]);
        }
    }
    public function update(Request $request){
        $customer = KhachHang::where('email', $request->user()->email)->first();
        $customer->hoTenKH = $request->hoTenKH;
        $customer->diaChi = $request->diaChi;
        $customer->sdt = $request->sdt;
        $customer->ngaySinh = $request->ngaySinh;
        $customer->save();

        $user = User::find(\auth()->id());
        $user->name = $request->hoTenKH;
        $user->save();
        
        return redirect()->route('show-profile')->with('update-success', 'Cập nhật thành công!');
    }
}
