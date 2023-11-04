<?php

namespace App\Http\Controllers;

use App\Models\Ve;
use App\Http\Requests\StoreVeRequest;
use App\Http\Requests\UpdateVeRequest;

class VeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchColumns = [
            'maDV' => 'like',
            'giaTien' => 'like',
            'loaiVe' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Ve::query();
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

        return view('admin.ves.index' , [
            'ves' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
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
     * @param  \App\Http\Requests\StoreVeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ve  $ve
     * @return \Illuminate\Http\Response
     */
    public function show(Ve $ve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ve  $ve
     * @return \Illuminate\Http\Response
     */
    public function edit(Ve $ve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVeRequest  $request
     * @param  \App\Models\Ve  $ve
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVeRequest $request, Ve $ve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ve  $ve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ve $ve)
    {
        //
    }
}
