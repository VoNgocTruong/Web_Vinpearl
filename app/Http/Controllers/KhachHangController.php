<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Http\Requests\StoreKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{

    public function index(Request $request)
    {
        $data = KhachHang::query()->paginate(6);
        return view('admin.khach_hangs.index' , [
            'khach_hangs' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.khach_hangs.create');
    }

    public function store(StoreKhachHangRequest $request)
    {
        //
    }

    public function show(KhachHang $khachHang)
    {

    }

    public function edit(KhachHang $khachHang)
    {

    }

    public function update(UpdateKhachHangRequest $request, KhachHang $khachHang)
    {
        //
    }

    public function destroy(KhachHang $khachHang)
    {
        //
    }
}
