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
<section class="overflow-hidden bg-white py-11 font-poppins">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/2 ">
                <div class="sticky top-0 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                        <img src="/storage/images/service_pic/{{$dich_vu[1]->maDV}}/{{$dich_vu[1]->anh}}" alt=""
                             class="object-cover w-full lg:h-full rounded-md">
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <div class="">
                        <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold md:text-4xl">
                            {{ $dich_vu[1]->tenDV }}</h2>
                        <div class="flex items-center mb-6">
                            <ul class="flex mr-2">
                                @for($i = 1; $i <= $dich_vu[1]->xepLoai; $i++)
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor"
                                                 class="w-4 mr-1 text-red-500 bi bi-star "
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="h-20 overflow-hidden">
                            <p class="max-w-md mb-2 text-gray-700">
                                {{ $dich_vu[1]->moTa }}
                            </p>
                        </div>
                        <button id="showMoreButton" class="block mb-2 font-bold">Xem thêm</button>
                        <p class="inline-block mb-4 text-4xl font-bold text-gray-700 ">
                            <span id="displayPrice"></span>
                        </p>
                    </div>
                    <div class="flex items-center mb-2">
                        <div class="text-xl font-bold flex">
                            Số Điện Thoại Dịch Vụ:
                            <p class="text-[20px] font-medium text-gray-700 ml-2">
                               {{ $dich_vu[1]->sdtDV }}
                            </p>
                        </div>
                    </div>
                    <div class="inline-block mb-2">
                        <div class="text-xl font-bold flex">
                            Địa Chỉ Dịch Vụ:
                        </div>
                        <p class="text-[20px] font-medium text-gray-700 ml-2">
                            {{ $dich_vu[1]->diaChiDV }}
                        </p>
                    </div>
                    <form method="post" action="{{ route('addToCart') }}">
                        @csrf
                        <input type="hidden" name="maDV" value="{{ $dich_vu[1]->maDV }}">
                    <div class="flex items-center mb-8">
                        <h2 class="text-xl font-bold">Loại Vé:</h2>
                        <div class="ml-4">
                            <select name="loaiVe" id="loaiVe" class="border border-blue-400 rounded px-3 py-1 focus:outline-none focus:border-blue-500">
                                <option value="1" data-price="{{ $dich_vu[1]->giaTien }}">Người Lớn</option>
                                <option value="0" data-price="{{ $dich_vu[0]->giaTien }}">Trẻ Em</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 ">
                        <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                            <a href="{{ route('index') }}#dichVu"
                                class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100">
                                Quay Về
                            </a>
                        </div>
                        <div class="w-full px-4 mb-4 lg:mb-0 lg:w-1/2">
                            <button
                                class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100">
                                Thêm Vào Giỏ
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('showMoreButton').addEventListener('click', function() {
        var div = document.querySelector('.h-20');
        if (div.classList.contains('h-20')) {
            div.classList.remove('h-20');
            div.classList.add('h-auto');
        } else {
            div.classList.remove('h-auto');
            div.classList.add('h-20');
        }
    });
    $(document).ready(function() {
        const displayPriceElement = $('#displayPrice');
        // Lấy giá trị mặc định khi trang được tải và format lại giá tiền
        const defaultPrice = parseFloat($('#loaiVe option:selected').data('price'));
        displayPriceElement.text(formatCurrency(defaultPrice));
        // Thay đổi giá trị khi chọn tùy chọn khác
        $('#loaiVe').change(function() {
            const selectedPrice = parseFloat($(this).find('option:selected').data('price'));
            displayPriceElement.text(formatCurrency(selectedPrice));
        });
        // Hàm format số thành định dạng tiền tệ Việt Nam
        function formatCurrency(amount) {
            return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }
    });
</script>
</body>
</html>
