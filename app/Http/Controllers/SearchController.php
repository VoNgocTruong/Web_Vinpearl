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
        $query = $request->input('timKiem');

        $searchResults = DichVu::where('tenDV', 'like', '%' . $query . '%')
            ->orWhereHas('getTenDV', function ($innerQuery) use ($query) {
                $innerQuery->where('tenLoai', 'like', '%' . $query . '%');
            })
            ->paginate(9);

        return view('search', compact('searchResults'));
    }
}
