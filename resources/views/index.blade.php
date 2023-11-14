<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Trang Chủ</title>
</head>
<body>
@include('layouts.nav')
<div class="bg-cover h-[500px] bg-[url('https://statics.vinwonders.com/styles/banner/public/2021_06/banner_nt_pc_1624243999.jpg.webp?itok=Ak-6ZWku')]">
    <div class="ml-8 text-white pt-16">
        <h1 class="text-[50px] text-bold">VINPEARL</h1>
        <h2 class="text-[35px]">SIÊU QUẦN THỂ VINPEARL</h2>
        <p class="text-[25px]">
            Siêu quẩn thể nghỉ dưỡng, vui chơi giải trí, mua sắm và<br />
            ẩm thực tại các điểm đến hàng đầu Việt Nam
        </p>
    </div>
</div>
<div class="container mx-auto flex mt-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="w-[550px] h-[500px] bg-cover bg-[url('/storage/images/picture1.png')] shadow-md rounded-md"></div>
        <div class="">
            <div class="border-l-4 border-blue-500 pl-6">
                <h6 class="text-blue-500 font-bold text-[20px]">Tổng quan</h6>
                <h6 class="font-bold text-[25px]">NƠI KHỞI ĐẦU KỲ TÍCH CỦA TRIỆU NIỀM VUI</h6>
            </div>
            <div class="font-bold text-[20px] mt-6">
                <span>
                    Vinpearl Nha Trang - Quần thể du lịch nghỉ dưỡng, vui chơi và khám phá biển hàng đầu Đông Nam Á, top 10 vịnh biển đẹp nhất hành tinh tạo nên vạn trải nghiệm nghỉ dưỡng đỉnh cao.
                </span>
            </div>
            <div class="bg-[#F8F9FA] p-4 shadow-md rounded-md mt-6">
                <div class="text-blue-500 text-center text-lg font-sm">
                    <span>GIỚI THIỆU</span>
                </div>
                <div class="mt-2">
                    <span>
                        Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dichVu" class="mt-6 p-12">
    <div class="border-l-4 border-blue-500 pl-6">
        <h6 class="text-blue-500 font-bold text-[20px]">DỊCH VỤ</h6>
        <h6 class="font-bold text-[25px]">DỊCH VỤ DÀNH CHO BẠN</h6>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-6 mt-4">
        @foreach($dich_vus as $dich_vu)
            <div class="w-[450px] shadow-md rounded-lg overflow-hidden">
                <div class="h-[250px]">
                    <img class="h-[250px] w-full" src="/storage/images/service_pic/{{$dich_vu->maDV}}/{{$dich_vu->anh}}" alt="">
                </div>
                <div class="text-center">
                    <p class="font-bold text-lg mt-2">{{ $dich_vu->tenDV }}</p>
                    <a href="{{ route('show', $dich_vu->maDV) }}" class="mb-4 duration-300 inline-flex items-center text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 mt-2">
                        Xem Chi Tiết
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6 px-2 flex justify-center items-center">
        {!! $dich_vus->links('layouts.pagination') !!}
    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam = urlParams.get('page');
        if (pageParam && parseInt(pageParam) >= 1) {
            window.location.hash = 'dichVu';
            document.getElementById('dichVu').scrollIntoView();
        }
    });
</script>
</html>
