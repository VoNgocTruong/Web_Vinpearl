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

        //sắp xếp
        $sortableColumns = ['maCa', 'maNV', 'soCa'];
        $defaultColumn = 'maCa'; // Cột mặc định
        $defaultOrder = 'asc'; // Thứ tự mặc định

        $column = $request->get('sort_by', $defaultColumn);
        $order = $request->get('order', $defaultOrder);

        if (!in_array($column, $sortableColumns)) {
            $column = $defaultColumn;
        }

        $data = $query->orderBy($column, $order)->paginate(5);
        // Thêm tham số sắp xếp vào URL paginate
        $data->appends(['sort_by' => $column, 'order' => $order]);

        return view('admin.so_cas.index' , [
            'so_cas' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'order' => $order,
        ]);
    }

    public function create()
    {
        $nhan_viens = NhanVien::all(); 
        return view('admin.so_cas.create', [
            'nhan_viens' => $nhan_viens
        ]);
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

    public function edit(SoCa $soCa)
    {
        $nhan_viens = NhanVien::all(); 
        return view('admin.so_cas.edit', [
            'so_ca' => $soCa,
            'nhan_viens' => $nhan_viens,
        ]);
    }

    public function update(UpdateSoCaRequest $request, SoCa $soCa)
    {
        $soCa->fill($request->validated());
        if ($soCa->save()) {
            return redirect()->route('so_cas.index')->with('success', 'Cập nhật thông tin số ca thành công!');
        }
        return redirect()->route('so_cas.index')->with('error', 'Không thể cập nhật thông tin số ca!');
    }

    public function destroy($maCa)
    {
        $result = SoCa::query()->where('maCa', $maCa)->delete();
        if ($result) {
            return redirect()->route('so_cas.index')->with('success', 'Số ca đã được xóa thành công!');
        }
        return redirect()->route('so_cas.index')->with('error', 'Không tìm thấy số ca của nhân viên để xoá!');
    }
}
