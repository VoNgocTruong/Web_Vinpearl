<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
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
}
