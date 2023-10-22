<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use App\Http\Requests\StoreDichVuRequest;
use App\Http\Requests\UpdateDichVuRequest;

class DichVuController extends Controller
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
     * @param  \App\Http\Requests\StoreDichVuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDichVuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DichVu  $dichVu
     * @return \Illuminate\Http\Response
     */
    public function show(DichVu $dichVu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DichVu  $dichVu
     * @return \Illuminate\Http\Response
     */
    public function edit(DichVu $dichVu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDichVuRequest  $request
     * @param  \App\Models\DichVu  $dichVu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDichVuRequest $request, DichVu $dichVu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DichVu  $dichVu
     * @return \Illuminate\Http\Response
     */
    public function destroy(DichVu $dichVu)
    {
        //
    }
}
