<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiNhanVien;
use App\Http\Requests\LoaiNhanVien\StoreLoaiNhanVienRequest;
use App\Http\Requests\LoaiNhanVien\UpdateLoaiNhanVienRequest;
use Illuminate\Support\Facades\Storage;

class LoaiNhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'tenLoai' => 'like',
            'maLoaiNV' => 'like',
            'luongCoBan' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = LoaiNhanVien::query();
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

        return view('admin.loai_nhan_viens.index' , [
            'loai_nhan_viens' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    public function create()
    {
        return view('admin.loai_nhan_viens.create');
    }

    public function store(StoreLoaiNhanVienRequest $request)
    {
        $data = $request->validated();

        $result = LoaiNhanVien::query()->create($data);
        if ($result) {
            return redirect()->route('loai_nhan_viens.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('loai_nhan_viens.index')->with('error', 'Không thêm được Chức vụ!');
    }

    public function show(LoaiNhanVien $loaiNhanVien)
    {
        return view('admin.loai_nhan_viens.show', [
            'loai_nhan_vien' => $loaiNhanVien,
        ]);
    }


    public function edit(LoaiNhanVien $loaiNhanVien)
    {
        return view('admin.loai_nhan_viens.edit', [
            'loai_nhan_vien' => $loaiNhanVien,
        ]);
    }

    public function update(UpdateLoaiNhanVienRequest $request, LoaiNhanVien $loaiNhanVien)
    {
        $loaiNhanVien->fill($request->validated());
        if ($loaiNhanVien->save()) {
            return redirect()->route('loai_nhan_viens.index')->with('success', 'Cập nhật thông tin khách hàng thành công!');
        }
        return redirect()->route('loai_nhan_viens.index')->with('error', 'Không thể cập nhật thông tin khách hàng!');
    }

    public function destroy(LoaiNhanVien $loaiNhanVien)
    {
        $result = LoaiNhanVien::query()->where('maLoaiNV', $maLoaiNV)->delete();
        if ($result) {
            return redirect()->route('loai_nhan_viens.index')->with('success', 'Chức vụ đã được xóa thành công!');
        }
        return redirect()->route('loai_nhan_viens.index')->with('error', 'Không tìm thấy chức vụ để xoá!');
    }
}
