<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hóa đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-sans bg-gray-100">

    <div class="max-w-2xl mx-auto p-4">
        <h2 class="text-2xl text-blue-500">Xin chào {{ $khach_hang->hoTenKH }}</h2>
        <p class="text-gray-700">Cảm ơn bạn đã đặt vé du lịch Vinpearl tại trang của chúng tôi. Bạn hãy vui lòng kiểm tra thông tin hóa đơn!</p>
    </div>

    <div class="max-w-2xl mx-auto p-4 mt-4 bg-white shadow-md">
        <h3 class="text-2xl font-semibold mb-2">Thông tin hóa đơn</h3>
        <table class="w-full table-auto">
            <tr>
                <th class="bg-blue-500 text-white p-2">Mã hóa đơn</th>
                <td class="p-2">{{ $newHoaDon->maHD }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Khách hàng</th>
                <td class="p-2">{{ $khach_hang->hoTenKH }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Email</th>
                <td class="p-2">{{ $khach_hang->email }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Số điện thoại</th>
                <td class="p-2">{{ $khach_hang->sdt }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Địa chỉ</th>
                <td class="p-2">{{ $khach_hang->diaChi }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Ngày thanh toán</th>
                <td class="p-2">{{ $newHoaDon->ngayThanhToan }}</td>
            </tr>
        </table>

        <h3 class="text-2xl font-semibold mb-2 mt-4">Chi tiết đơn hàng</h3>
        <table class="w-full table-auto">
            <tr>
                <th class="bg-blue-500 text-white p-2">STT</th>
                <th class="bg-blue-500 text-white p-2">Tên dịch vụ</th>
                <th class="bg-blue-500 text-white p-2">Loại vé</th>
                <th class="bg-blue-500 text-white p-2">Số lượng</th>
                <th class="bg-blue-500 text-white p-2">Giá tiền</th>
            </tr>
            @php $stt = 1; @endphp
            @foreach($cart as $maVe => $each)
                <tr>
                    <td class="p-2">{{ $stt++ }}</td>
                    <td class="p-2">
                        @if(isset($each['tenDV']))
                            {{ $each['tenDV'] }}
                        @else
                            Dịch vụ không tồn tại
                        @endif
                    </td>
                    <td class="p-2">
                        @if(isset($each['loaiVe']))
                            @if($each['loaiVe'] == 0)
                                Trẻ em
                            @elseif($each['loaiVe'] == 1)
                                Người lớn
                            @endif
                        @endif
                    </td>
                    <td class="p-2">{{ $each['quantity'] }} </td>
                    <td class="p-2">{{ number_format($each['gia'], 0, ',', '.')  . ' VNĐ'}}</td>
                </tr>
            @endforeach
        </table>

        <h3 class="text-2xl font-semibold mb-2 mt-4">Tổng thanh toán</h3>
        <h3 class="text-2xl font-semibold mb-2 mt-4">
            @php
                $totalAmount = 0;
                foreach ($cart as $maVe => $each) {
                    $totalAmount += $each['quantity'] * $each['gia'];
                }
                echo number_format($totalAmount, 0, ',', '.') . ' VNĐ';
            @endphp
        </h3>
    </div>
</body>
</html>
