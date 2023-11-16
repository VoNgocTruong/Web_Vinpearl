<?php

namespace App\Http\Controllers;

use App\Models\Ve;
use App\Models\DichVu;
use App\Http\Requests\Ve\StoreVeRequest;
use App\Http\Requests\Ve\UpdateVeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\VeExport;
use Maatwebsite\Excel\Facades\Excel;

class VeController extends Controller
{
    public function index(Request $request)
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
        $query->leftJoin('dich_vus', 'ves.maDV', '=', 'dich_vus.maDV')
        ->select('ves.*', 'dich_vus.tenDV');

        if (array_key_exists($column, $searchColumns)) {
            $operator = $searchColumns[$column];
            if (!empty($keywords)) {
                if ($operator === 'like') {
                    $keywords = '%' . $keywords . '%';
                }
                $query->where($column, $operator, $keywords);
            }
        }

        //sắp xếp
        $sortableColumns = ['maVe', 'tenDV', 'loaiVe', 'giaTien'];
        $defaultColumn = 'maVe'; // Cột mặc định
        $defaultOrder = 'asc'; // Thứ tự mặc định
 
        $column = $request->get('sort_by', $defaultColumn);
        $order = $request->get('order', $defaultOrder);
 
        if (!in_array($column, $sortableColumns)) {
            $column = $defaultColumn;
        }
 
        $data = $query->orderBy($column, $order)->paginate(10);
        // Thêm tham số sắp xếp vào URL paginate
        $data->appends(['sort_by' => $column, 'order' => $order]);

        return view('admin.ves.index' , [
            'ves' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'order' => $order,
        ]);

    }

    public function create()
    {
        $dich_vus = DichVu::all(); 
        return view('admin.ves.create', [
            'dich_vus' => $dich_vus
        ]);
    }

    public function store(StoreVeRequest $request)
    {
        $data = $request->validated();
        $result = Ve::query()->create($data);
        if ($result) {
            return redirect()->route('ves.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('ves.index')->with('error', 'Không thêm được vé!');
    }

    public function show(Ve $ve)
    {
        //
    }

    public function edit(Ve $ve)
    {
        $dich_vus = DichVu::all(); 
        return view('admin.ves.edit', [
            've' => $ve,
            'dich_vus' => $dich_vus,
        ]);
    }

    public function update(UpdateVeRequest $request, Ve $ve)
    {
        $ve->fill($request->validated());
        if ($ve->save()) {
            return redirect()->route('ves.index')->with('success', 'Cập nhật thông tin vé thành công!');
        }
        return redirect()->route('ves.index')->with('error', 'Không thể cập nhật thông tin vé!');
    }

    public function destroy($maVe)
    {
        $result = Ve::query()->where('maVe', $maVe)->delete();
        if ($result) {
            return redirect()->route('ves.index')->with('success', 'Vé đã được xóa thành công!');
        }
        return redirect()->route('ves.index')->with('error', 'Không tìm thấy vé để xoá!');
    }
    public function export()
    {
        return Excel::download(new VeExport(), 'vess'.'.xlsx');
    }
}
