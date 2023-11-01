<?php

namespace App\Http\Controllers;

use App\Models\SoCa;
use App\Models\NhanVien;
use App\Http\Requests\SoCa\StoreSoCaRequest;
use App\Http\Requests\SoCa\UpdateSoCaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoCaController extends Controller
{
    public function index(Request $request)
    {
        $searchColumns = [
            'maCa' => 'like',
            'maNV' => 'like',
            'soCa' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = SoCa::query();
        if (array_key_exists($column, $searchColumns)) {
            $operator = $searchColumns[$column];
            if (!empty($keywords)) {
                if ($operator === 'like') {
                    $keywords = '%' . $keywords . '%';
                }
                $query->where($column, $operator, $keywords);
            }
        }
        $data = $query->paginate(5);

        return view('admin.so_cas.index' , [
            'so_cas' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    public function create()
    {
        $nhan_viens = NhanVien::all(); 
        return view('admin.so_cas.create', ['nhan_viens' => $nhan_viens]);
    }

    public function store(StoreSoCaRequest $request)
    {
        $data = $request->validated();
        $result = SoCa::query()->create($data);
        if ($result) {
            return redirect()->route('so_cas.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('so_cas.index')->with('error', 'Không thêm được số ca!');
    }

    public function show(SoCa $soCa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoCa  $soCa
     * @return \Illuminate\Http\Response
     */
    public function edit(SoCa $soCa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoCaRequest  $request
     * @param  \App\Models\SoCa  $soCa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoCaRequest $request, SoCa $soCa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoCa  $soCa
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoCa $soCa)
    {
        //
    }
}
