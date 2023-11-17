<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function showProfile(Request $request){
        $user = KhachHang::where('email', $request->user()->email)->first();
        $gender = 'Nam';
        if($user->gioiTinh != NULL and $user->gioiTinh == 0) $gender = 'Nữ';
        return view('profile.profile', [
            'user' => $user,
            'gender' => $gender
        ]);
    }
    public function edit(Request $request){
        $user = KhachHang::where('email', $request->user()->email)->first();
        $gender = 'Nam';
        if($user->gioiTinh != NULL and $user->gioiTinh == 0) $gender = 'Nữ';
        return view('profile.edit', [
            'user' => $user,
            'gender' => $gender,
        ]);
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
