<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHang\StoreKhachHangRequest;
use App\Http\Requests\KhachHang\UpdateKhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\KhachHangExport;
use Maatwebsite\Excel\Facades\Excel;

class KhachHangController extends Controller
{

    public function index(Request $request)
    {
        $searchColumns = [
            'hoTenKH' => 'like',
            'maKH' => 'like',
            'sdt' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = KhachHang::query();
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

        return view('admin.khach_hangs.index' , [
            'khach_hangs' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    public function create()
    {
        return view('admin.khach_hangs.create');
    }

    public function store(StoreKhachHangRequest $request)
    {
        $data = $request->validated();
        $data['matKhau'] = bcrypt($data['matKhau']);
        if ($request->hasFile('anh')) {
            $image = $request->file('anh');
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $data['anh'] = $imageName;
        }
        $result = KhachHang::query()->create($data);
        if ($result) {
            return redirect()->route('khach_hangs.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('khach_hangs.index')->with('error', 'Không thêm được khách hàng!');
    }

    public function show(KhachHang $khachHang)
    {
        return view('admin.khach_hangs.show', [
            'khach_hang' => $khachHang,
        ]);
    }

    public function edit(KhachHang $khachHang)
    {
        return view('admin.khach_hangs.edit', [
            'khach_hang' => $khachHang,
        ]);
    }

    public function update(UpdateKhachHangRequest $request, KhachHang $khachHang)
    {
        $khachHang->fill($request->validated());
        if ($request->hasFile('anh')) {
            $image = $request->file('anh');
            $userId = $khachHang['maKH'];
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/images/user_avt/$userId", $imageName);
            $khachHang['anh'] = $imageName;
        }
        if ($khachHang->save()) {
            return redirect()->route('khach_hangs.index')->with('success', 'Cập nhật thông tin khách hàng thành công!');
        }
        return redirect()->route('khach_hangs.index')->with('error', 'Không thể cập nhật thông tin khách hàng!');
    }

    public function destroy($maKH)
    {
        $result = KhachHang::query()->where('maKH', $maKH)->delete();
        if ($result) {
            return redirect()->route('khach_hangs.index')->with('success', 'Khách hàng đã được xóa thành công!');
        }
        return redirect()->route('khach_hangs.index')->with('error', 'Không tìm thấy khách hàng để xoá!');
    }

    public function export()
    {
        return Excel::download(new KhachHangExport(), 'khach-hangs'.'.xlsx');
    }
}
