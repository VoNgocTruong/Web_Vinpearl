<?php

namespace App\Http\Controllers;

use App\Models\Cthd;
use App\Models\DichVu;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\User;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function showProfile(Request $request){
        $gender = 'Nam';
        if(Auth::user()->admin == 1){
            $user = User::find(auth()->id());
            return view('profile.profile', [
                'user' => $user,
                'name' => $user->name,
                'gender' => '',
                'member' => 'Admin',
            ]);
        }
        else{
            $user = KhachHang::where('email', $request->user()->email)->first();
            $lichSuGiaoDich = HoaDon::where('maKH', $user->maKH)->get();
            $cthd = Cthd::all();
            $ve = Ve::all();
            $dichVu = DichVu::all();
            if($user->gioiTinh == 0) $gender = 'Nữ';
            return view('profile.profile', [
                'user' => $user,
                'name' => $user->hoTenKH,
                'gender' => $gender,
                'member' => 'Thành viên',
                'lichSuGiaoDich' => $lichSuGiaoDich,
                'cthds' => $cthd,
                'ves' => $ve,
                'dichVus' => $dichVu,
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
                'gender' => '',
                'member' => 'Admin',
            ]);
        }
        else{
            $user = KhachHang::where('email', $request->user()->email)->first();
            if($user->gioiTinh == 0) $gender = 'Nữ';
            return view('profile.edit', [
                'user' => $user,
                'name' => $user->hoTenKH,
                'gender' => $gender,
                'member' => 'Thành viên'
            ]);
        }
    }
    public function update(Request $request){
        if($request->has('submit')){
            $customer = KhachHang::where('email', $request->user()->email)->first();
            $customer->hoTenKH = $request->hoTenKH;
            $customer->diaChi = $request->diaChi;
            $customer->sdt = $request->sdt;
            $customer->ngaySinh = $request->ngaySinh;
            $customer->gioiTinh = $request->input('gioiTinh');
            $customer->save();

            $user = User::find(\auth()->id());
            $user->name = $request->hoTenKH;
            $user->save();

            return redirect()->route('show-profile')->with('update-success', 'Cập nhật thành công!');
        }
        else{
            return redirect()->route('show-profile');
        }
    }
}
