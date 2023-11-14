<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use App\Models\LoaiDichVu;
use App\Http\Requests\DichVu\StoreDichVuRequest;
use App\Http\Requests\DichVu\UpdateDichVuRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DichVuController extends Controller
{
    public function index(Request $request)
    {
        $searchColumns = [
            'tenDV' => 'like',
            'maDV' => 'like',
            'xepLoai' => 'like',
            'diaChiDV' => 'like',
            'sdtDV' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = DichVu::query();
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
        return view('admin.dich_vus.index' , [
            'dich_vus' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }
    public function homeIndex() {
        $data = DichVu::query()->paginate(9);
        return view('index', [
            'dich_vus' => $data,
        ]);
    }
    public function create()
    {
        $loai_dich_vus = LoaiDichVu::all();
        return view('admin.dich_vus.create', ['loai_dich_vus' => $loai_dich_vus]);
    }

    public function store(StoreDichVuRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('anh')) {
            $image = $request->file('anh');
            $imageName = 'picture' . '.' . $image->getClientOriginalExtension();
            $data['anh'] = $imageName;
        }
        $result = DichVu::query()->create($data);
        if ($result) {
            return redirect()->route('dich_vus.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('dich_vus.index')->with('error', 'Không thêm được dịch vụ!');
    }

    public function show(DichVu $dichVu)
    {
        return view('admin.dich_vus.show', [
            'dich_vu' => $dichVu,
        ]);
    }
    public function showForCustomer($id)
    {
        $dichVu =  DichVu::query()->find($id);
        if ($dichVu) {
            return view('show', [
                'dich_vu' => $dichVu,
            ]);
        } else {
            abort(404);
        }
    }
    public function edit(DichVu $dichVu)
    {
        $loai_dich_vus = LoaiDichVu::all();
        return view('admin.dich_vus.edit', [
            'dich_vu' => $dichVu,
            'loai_dich_vus' => $loai_dich_vus,
        ]);
    }
    public function update(UpdateDichVuRequest $request, DichVu $dichVu)
    {
        $dichVu->fill($request->validated());
        if ($dichVu->save()) {
            return redirect()->route('dich_vus.index')->with('success', 'Cập nhật thông tin dịch vụ thành công!');
        }
        return redirect()->route('dich_vus.index')->with('error', 'Không thể cập nhật thông tin dịch vụ!');
    }
    public function destroy($maDV)
    {
        $result = DichVu::query()->where('maDV', $maDV)->delete();
        if ($result) {
            return redirect()->route('dich_vus.index')->with('success', 'Dịch vụ đã được xóa thành công!');
        }
        return redirect()->route('dich_vus.index')->with('error', 'Xoá dịch vụ thất bại! Mời thử lại!');
    }
}
