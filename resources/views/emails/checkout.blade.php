<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hóa đơn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body class="font-sans bg-gray-100">

<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-2xl text-blue-500">Xin chào {{$user->name}}</h2>
    <p class="text-gray-700">Bạn đã đặt vé du lịch Vinpearl tại trang của chúng tôi. Vui lòng kiểm tra thông tin hóa đơn của bạ và nhấn xác nhận!</p>
</div>

<div class="max-w-2xl mx-auto p-4 mt-4 bg-white shadow-md">
	<h3>Người đặt vé</h3>
    <table class="w-full table-auto">
    	<tr>
            <th class="bg-blue-500 text-white p-2">Name</th>
            <td class="p-2">{{ $order->hoTenKH }}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Email</th>
            <td class="p-2">{{ $order->email}}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Phone</th>
            <td class="p-2">{{ $order->sdt }}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Địa Chỉ</th>
            <td class="p-2">{{ $order->diaChi }}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Tên dịch vụ</th>
            <td class="p-2">{{ $order->tenDV}}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Ngày thanh toán</th>
            <td class="p-2">{{ $order->ngayThanhToan }}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Số Lượng</th>
            <td class="p-2">{{ $order->soLuong }}</td>
        </tr>
        <tr>
            <th class="bg-blue-500 text-white p-2">Tổng Tiền</th>
            <td class="p-2">{{ $order->tongTien }}</td>
        </tr>
    </table>
</div>

</body>
</html>
