<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Http\Requests\StoreKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKhachHangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKhachHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show(KhachHang $khachHang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit(KhachHang $khachHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhachHangRequest  $request
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKhachHangRequest $request, KhachHang $khachHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhachHang $khachHang)
    {
        //
    }
}
