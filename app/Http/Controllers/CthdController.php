<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cthd\UpdateCthdRequest as CthdUpdateCthdRequest;
use App\Models\Cthd;
use App\Http\Requests\StoreCthdRequest;
use App\Http\Requests\UpdateCthdRequest;
use App\Models\HoaDon;

class CthdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cthd = Cthd::all();
        return view('admin.cthd.index', ['cthd' => $cthd]);
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
     * @param  \App\Http\Requests\StoreCthdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CthdUpdateCthdRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cthd  $cthd
     * @return \Illuminate\Http\Response
     */
    public function show($maHD)
    {
        $hoadon = HoaDon::where('maHD', $maHD)->first();
        $cthd = CTHD::where('maHD', $maHD)->first();
        if ($hoadon) {
            return view('admin.hoadon.show', ['hoadon' => $hoadon, 'cthd' => $cthd]);
        } else {
            return redirect()->route('cthd.index')->with('error', 'Hóa đơn không tồn tại');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cthd  $cthd
     * @return \Illuminate\Http\Response
     */
    public function edit($maHD)
    {   $hoadon = HoaDon::where('maHD', $maHD)->first();
        $cthd = CTHD::where('maHD', $maHD)->first();
        return view('admin.hoadon.edit', ['hoadon' => $hoadon, 'cthd' => $cthd]);
    }

    public function update(CthdUpdateCthdRequest $request, $maHD)
    {
        $cthd = Cthd::where('maHD', $maHD)->first();

        if (!$cthd) {
            return redirect()->route('cthd.index')->with('error', 'Cthd not found');
        }

        $validatedData = $request->validated();

        // Update the Cthd record with the validated data
        $cthd->update($validatedData);

        return redirect()->route('cthd.index')->with('success', 'Cthd updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cthd  $cthd
     * @return \Illuminate\Http\Response
     */
    public function destroy($maHD)
    {
        //
    }
}
