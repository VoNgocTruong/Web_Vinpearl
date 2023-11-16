<?php

namespace App\Http\Controllers;

use App\Models\LoaiDichVu;
use App\Http\Requests\LoaiDichVu\StoreLoaiDichVuRequest;
use App\Http\Requests\LoaiDichVu\UpdateLoaiDichVuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\LoaiDichVuExport;
use Maatwebsite\Excel\Facades\Excel;

class LoaiDichVuController extends Controller
{

    public function index(Request $request)
    {
        $searchColumns = [
            'maLoaiDV' => 'like',
            'tenLoai' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = LoaiDichVu::query();
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
        $sortableColumns = ['maLoaiDV', 'tenLoai'];
        $defaultColumn = 'maLoaiDV'; // Cột mặc định
        $defaultOrder = 'asc'; // Thứ tự mặc định

        $column = $request->get('sort_by', $defaultColumn);
        $order = $request->get('order', $defaultOrder);

        if (!in_array($column, $sortableColumns)) {
            $column = $defaultColumn;
        }

        $data = $query->orderBy($column, $order)->paginate(7);
        // Thêm tham số sắp xếp vào URL paginate
        $data->appends(['sort_by' => $column, 'order' => $order]);

        return view('admin.loai_dich_vus.index' , [
            'loai_dich_vus' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'order' => $order,
        ]);
    }


    public function create()
    {
        return view('admin.loai_dich_vus.create');
    }


    public function store(StoreLoaiDichVuRequest $request)
    {
        $data = $request->validated();
        $result = LoaiDichVu::query()->create($data);
        if ($result) {
            return redirect()->route('loai_dich_vus.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('loai_dich_vus.index')->with('error', 'Không thêm được loại dịch vụ!');
    }

    public function show(LoaiDichVu $loaiDichVu)
    {
        //
    }

    public function edit(LoaiDichVu $loaiDichVu)
    {
        return view('admin.loai_dich_vus.edit', [
            'loai_dich_vu' => $loaiDichVu,
        ]);
    }
    public function update(UpdateLoaiDichVuRequest $request, LoaiDichVu $loaiDichVu)
    {
        $loaiDichVu->fill($request->validated());
        if ($loaiDichVu->save()) {
            return redirect()->route('loai_dich_vus.index')->with('success', 'Cập nhật thông tin loại dịch vụ thành công!');
        }
        return redirect()->route('loai_dich_vus.index')->with('error', 'Không thể cập nhật thông tin loại dịch vụ!');
    }


    public function destroy($maLoaiDV)
    {
        $result = LoaiDichVu::query()->where('maLoaiDV', $maLoaiDV)->delete();
        if ($result) {
            return redirect()->route('loai_dich_vus.index')->with('success', 'Xóa thành công!');
        }
        return redirect()->route('loai_dich_vus.index')->with('error', 'Không xóa được loại dịch vụ!');
    }

    public function export()
    {
        return Excel::download(new LoaiDichVuExport(), 'loai-dich-vus'.'.xlsx');
    }
}
