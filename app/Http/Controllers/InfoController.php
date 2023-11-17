<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function show()
    {
        // Trong phương thức này, bạn có thể truy vấn dữ liệu cần thiết và truyền nó đến view
        $members = [
            ['id' => 1, 'name' => 'Võ Ngọc Trường', 'studentId' => '62132501', 'tasks' => 'Bảng Khách Hàng (admin), Trang Chủ (user), Hiển thị chi tiết dịch vụ (user), Giỏ hàng (user)'],
            ['id' => 2, 'name' => 'Nguyễn Hoài Duy', 'studentId' => '62130336', 'tasks' => 'Bảng loại nhân viên(admin), Bảng nhân viên(admin), Bảng số ca(admin), Tìm kiếm dịch vụ(user)'],
            ['id' => 3, 'name' => 'Đặng Trúc Ly', 'studentId' => '62131061', 'tasks' => 'Bảng Dịch Vụ (admin), Bảng Vé(admin), Bảng Loại Dịch Vụ(admin), Thanh toán(user)'],
            ['id' => 4, 'name' => 'Trần Lê Quang Minh', 'studentId' => '62131114', 'tasks' => 'Bảng CTHD(admin), Bảng Hoá Đơn(admin), Thông tin khách hàng(user)'],
            ['id' => 5, 'name' => 'Nguyễn Hoàng Duy', 'studentId' => '62130337', 'tasks' => 'Đăng nhập, đăng ký, đăng xuất(user, admin)'],
        ];

        return view('info', compact('members'));
    }
}
