@extends('layouts.master')
@section('content')
    @include('layouts.notifySuccess')
    <div class="mb-2 flex">
        <a href="{{ route('nhan_viens.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Thêm
        </a>
        <div class="ml-4 mr-2">
            <form action="" method="GET" class="flex items-center space-x-4">
                <label for="search_by" class="font-bold">Tìm kiếm theo:</label>
                <select name="search_by" id="search_by" class="p-2 border rounded">
                    <option value="hoTenNV" @if($column == 'hoTenNV') selected @endif>Họ Tên</option>
                    <option value="maNV" @if($column == 'maNV') selected @endif>Mã Nhân Viên</option>
                    <option value="sdt" @if($column == 'sdt') selected @endif>Số điện thoại</option>
                    <option value="gioiTinh" @if($column == 'gioiTinh') selected @endif>Giới tính</option>
                </select>
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Nhập từ khóa" class="p-2 border rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out cursor-pointer">
                    Tìm kiếm
                </button>
            </form>
        </div>
        <a href="{{ route('nhan_viens.index') }}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Reset
        </a>
        <a href="{{ route('nhan_viens.export') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Export <i class="fas fa-file-excel fa-lg ml-2"></i>
        </a>        
        
    </div>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="font-bold text-xl">Nhân viên</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th data-column="maNV" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mã NV</th>

                        <th data-column="hoTenNV" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Họ Tên & Email</th>
                        <th data-column="sdt" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">SĐT</th>
                        <th data-column="diaChi" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Địa Chỉ</th>
                        <th data-column="ngaySinh" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Ngày Sinh</th>
                        <th data-column="gioiTinh" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Giới Tính</th>
                        <th data-column="tenLoai" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Chức vụ</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nhan_viens as $nv)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-x1">{{ $nv->maNV }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('storage/images/employee_avt/' . $nv->maNV . '/' . $nv->anh) }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-x1">{{ $nv->hoTenNV }}</h6>
                                    <p class="mb-0 leading-tight text-x1 text-slate-400">{{ $nv->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $nv->sdt }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $nv->diaChi }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $nv->getNgaySinh }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $nv->gioiTinh }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $nv->getTenLoai->tenLoai }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <form class="inline-block mr-1" action="{{ route('nhan_viens.destroy', $nv->maNV) }}" method="post" id="deleteForm{{$nv->maNV}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-semibold leading-tight text-x1 text-slate-400 delete-btn" data-employee-id="{{ $nv->maNV }}">Xoá</button>
                            </form>|
                            <a href="{{ route('nhan_viens.edit', $nv->maNV) }}" class="font-semibold leading-tight text-x1 text-slate-400"> Sửa </a> |
                            <a href="{{ route('nhan_viens.show', $nv->maNV) }}" class="font-semibold leading-tight text-x1 text-slate-400"> Chi Tiết </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2 px-2">
                    {{ $nhan_viens->links() }}
                </div>
            </div>
        </div>
    </div> 
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy danh sách các cột có thể sắp xếp
            const sortableColumns = document.querySelectorAll('.sortable-column');

            // Đặt sự kiện click cho mỗi cột
            sortableColumns.forEach(column => {
                column.addEventListener('click', function () {
                    const columnType = this.dataset.column;
                    const currentOrder = this.dataset.order;
                    const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';

                    // Chuyển đến trang index với tham số sắp xếp
                    window.location.href = `{{ route('nhan_viens.index') }}?sort_by=${columnType}&order=${newOrder}`;
                });
            });     
             
            //xử lý nút xóa
            // const deleteButtons = document.querySelectorAll('.delete-btn');
            // deleteButtons.forEach(button => {
            //     button.addEventListener('click', function () {
            //         const confirmation = confirm('Bạn có chắc chắn muốn xóa nhân viên này không?');
            //         if (confirmation) {
            //             const maNV = this.getAttribute('data-employee-id');
            //             const deleteForm = document.getElementById('deleteForm' + maNV);
            //             deleteForm.submit();
            //         }
            //     });
            // });             
            
            //xử lý nút xóa
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const maNV = this.getAttribute('data-employee-id');

                    Swal.fire({
                        title: 'Xác nhận xóa nhân viên',
                        html: `Bạn có chắc chắn muốn xóa nhân viên này không?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const deleteForm = document.getElementById('deleteForm' + maNV);
                            deleteForm.submit();
                        }
                    });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endsection
