<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\LoaiNhanVien;
use App\Http\Requests\NhanVien\StoreNhanVienRequest;
use App\Http\Requests\NhanVien\UpdateNhanVienRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\NhanVienExport;
use Maatwebsite\Excel\Facades\Excel;

class NhanVienController extends Controller
{

    public function index(Request $request)
    {
        $searchColumns = [
            'hoTenNV' => 'like',
            'maNV' => 'like',
            'sdt' => 'like',
            'gioiTinh' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = NhanVien::query();
        $query->leftJoin('loai_nhan_viens', 'nhan_viens.maLoaiNV', '=', 'loai_nhan_viens.maLoaiNV')
              ->select('nhan_viens.*', 'loai_nhan_viens.tenLoai');

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
        $sortableColumns = ['maNV', 'hoTenNV', 'sdt', 'gioiTinh', 'ngaySinh', 'diaChi', 'tenLoai'];
        $defaultColumn = 'maNV'; // Cột mặc định
        $defaultOrder = 'asc'; // Thứ tự mặc định

        $column = $request->get('sort_by', $defaultColumn);
        $order = $request->get('order', $defaultOrder);

        if (!in_array($column, $sortableColumns)) {
            $column = $defaultColumn;
        }

        $data = $query->orderBy($column, $order)->paginate(5);
        // Thêm tham số sắp xếp vào URL paginate
        $data->appends(['sort_by' => $column, 'order' => $order]);

        return view('admin.nhan_viens.index', [
            'nhan_viens' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'order' => $order,
        ]);
    }

    public function create()
    {
        $loai_nhan_viens = LoaiNhanVien::all(); 
        return view('admin.nhan_viens.create', ['loai_nhan_viens' => $loai_nhan_viens]);
    }

    public function store(StoreNhanVienRequest $request)
    {
        $data = $request->validated();
        $data['matKhau'] = bcrypt($data['matKhau']);
        if ($request->hasFile('anh')) {
            $image = $request->file('anh');
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $data['anh'] = $imageName;
        }
        $result = NhanVien::query()->create($data);
        if ($result) {
            return redirect()->route('nhan_viens.index')->with('success', 'Thêm thành công!');
        }
        return redirect()->route('nhan_viens.index')->with('error', 'Không thêm được khách hàng!');
    }

    public function show(NhanVien $nhanVien)
    {
        return view('admin.nhan_viens.show', [
            'nhan_vien' => $nhanVien,
        ]);
    }

    public function edit(NhanVien $nhanVien)
    {
        $loai_nhan_viens = LoaiNhanVien::all(); 
        return view('admin.nhan_viens.edit', [
            'nhan_vien' => $nhanVien,
            'loai_nhan_viens' => $loai_nhan_viens,
        ]);
    }

    public function update(UpdateNhanVienRequest $request, NhanVien $nhanVien)
    {
        $nhanVien->fill($request->validated());
        if ($request->hasFile('anh')) {
            $image = $request->file('anh');
            $employeeID = $nhanVien['maNV'];
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/images/employee_avt/$employeeID", $imageName);
            $nhanVien['anh'] = $imageName;
        }
        if ($nhanVien->save()) {
            return redirect()->route('nhan_viens.index')->with('success', 'Cập nhật thông tin khách hàng thành công!');
        }
        return redirect()->route('nhan_viens.index')->with('error', 'Không thể cập nhật thông tin khách hàng!');
    }

    public function destroy($maNV)
    {
        $result = NhanVien::query()->where('maNV', $maNV)->delete();
        if ($result) {
            return redirect()->route('nhan_viens.index')->with('success', 'Nhân viên đã được xóa thành công!');
        }
        return redirect()->route('nhan_viens.index')->with('error', 'Không tìm thấy nhân viên để xoá!');
    }

    public function export()
    {
        return Excel::download(new NhanVienExport(), 'nhan-viens'.'.xlsx');
    }

}
