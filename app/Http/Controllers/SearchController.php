<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\DichVu;
use App\Models\LoaiDichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Search\StoreSearchRequest;   
use App\Http\Requests\Search\UpdateSearchRequest;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('timKiem'); // Update to match your actual input name

        $searchResults = DichVu::where('tenDV', 'like', '%' . $query . '%')
            ->orWhereHas('getTenDV', function ($innerQuery) use ($query) {
                $innerQuery->where('tenLoai', 'like', '%' . $query . '%');
            })
            ->paginate(9);

        return view('search', compact('searchResults'));
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
     * @param  \App\Http\Requests\StoreSearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSearchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSearchRequest  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSearchRequest $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
