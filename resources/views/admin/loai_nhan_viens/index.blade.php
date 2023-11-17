@extends('layouts.master')
@section('content')
    @include('layouts.notifySuccess')
    <div class="mb-2 flex">
        <a href="{{ route('loai_nhan_viens.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Thêm
        </a>
        <div class="ml-4 mr-2">
            <form action="" method="GET" class="flex items-center space-x-4">
                <label for="search_by" class="font-bold">Tìm kiếm theo:</label>
                <select name="search_by" id="search_by" class="p-2 border rounded">
                    <option value="tenLoai" @if($column == 'tenLoai') selected @endif>Tên loại NV</option>
                    <option value="maLoaiNV" @if($column == 'maLoaiNV') selected @endif>Mã Loại NV</option>
                    <option value="luongCoBan" @if($column == 'luongCoBan') selected @endif>Lương Cơ bản</option>
                </select>
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Nhập từ khóa" class="p-2 border rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out cursor-pointer">
                    Tìm kiếm
                </button>
            </form>
        </div>
        <a href="{{ route('loai_nhan_viens.index') }}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Reset
        </a>

        <a href="{{ route('loai_nhan_viens.export') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Export <i class="fas fa-file-excel fa-lg ml-2"></i>
        </a> 

    </div>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="font-bold text-xl">Chức Vụ Nhân Viên</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th data-column="maLoaiNV" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mã Loại NV</th>
                        <th data-column="tenLoai" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tên loại</th>
                        <th data-column="luongCoBan" data-order="{{ $order }}" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Lương Cơ Bản</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loai_nhan_viens as $lnv)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-x1">{{ $lnv->maLoaiNV }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $lnv->tenLoai }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1 luongCoBan">{{ $lnv->luongCoBan }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <form class="inline-block mr-1" action="{{ route('loai_nhan_viens.destroy', $lnv->maLoaiNV) }}" method="post" id="deleteForm{{$lnv->maLoaiNV}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-semibold leading-tight text-x1 text-slate-400 delete-btn" data-type-employee-id="{{ $lnv->maLoaiNV }}">Xoá</button>
                            </form>|
                            <a href="{{ route('loai_nhan_viens.edit', $lnv->maLoaiNV) }}" class="font-semibold leading-tight text-x1 text-slate-400"> Sửa </a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2 px-2">
                    {{ $loai_nhan_viens->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Bắt sự kiện khi trang được tải
            $('.luongCoBan').each(function() {
                formatCurrency($(this));
            });

            // Hàm format số thành định dạng tiền tệ Việt Nam
            function formatCurrency(inputElement) {
                // Lấy giá trị từ phần tử HTML
                let originalValue = inputElement.text().trim();

                // Chuyển đổi giá trị thành số
                let numericValue = parseFloat(originalValue.replace(/[^0-9]/g, ''));

                // Kiểm tra xem giá trị có phải là một số hợp lệ không
                if (!isNaN(numericValue)) {
                    // Định dạng số thành tiền tệ Việt Nam
                    let formattedValue = numericValue.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

                    // Hiển thị giá trị đã định dạng trong phần tử HTML
                    inputElement.text(formattedValue);
                }
            }
        });

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
                    window.location.href = `{{ route('loai_nhan_viens.index') }}?sort_by=${columnType}&order=${newOrder}`;
                });
            });

            //xử lý nút xóa
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const maLoaiNV = this.getAttribute('data-type-employee-id');

                    Swal.fire({
                        title: 'Xác nhận xóa loại nhân viên',
                        html: `Bạn có chắc chắn muốn xóa loại nhân viên này không?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const deleteForm = document.getElementById('deleteForm' + maLoaiNV);
                            deleteForm.submit();
                        }
                    });
                });
            });   
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
