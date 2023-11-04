<?php

namespace App\Http\Controllers;

use App\Models\LoaiDichVu;
use App\Http\Requests\LoaiDichVu\StoreLoaiDichVuRequest;
use App\Http\Requests\LoaiDichVu\UpdateLoaiDichVuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $query->paginate(5);

        return view('admin.loai_dich_vus.index' , [
            'loai_dich_vus' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
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
}
