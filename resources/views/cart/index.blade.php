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
    <title>Giỏ Hàng</title>
</head>
<body class="bg-gray-100">
@include('layouts.nav')
<div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Giỏ Hàng</h1>
            </div>
            @if(session()->has('cart'))
            @php
                $cart = session('cart');
                $tongTien = 0;
            @endphp
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Thông Tin Dịch Vụ</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số Lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng Tiền</h3>
            </div>
            @foreach($cart as $maVe => $each)
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5">
                        <div class="w-20">
                            <img class="h-24" src="/storage/images/service_pic/{{$each['maDV']}}/{{$each['anh']}}" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                            <span class="font-bold text-sm">{{ $each['tenDV'] }}</span>
                            <span class="font-bold text-xs">Loại Vé: {{ $each['loaiVe'] == 0 ? 'Trẻ em' : 'Người lớn' }}</span>
                            <form method="post" action="{{ route('removeItemFromCart') }}">
                                @csrf
                                <input name="maVe" type="hidden" value="{{ $maVe }}">
                                <button class="font-semibold text-red-500 text-xs">Xoá</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <form method="post" action="{{ route('decreaseQuantity')}}">
                            @csrf
                            <input name="maVe" type="hidden" value="{{ $maVe }}">
                            <button>
                                <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                </svg>
                            </button>
                        </form>
                        <input class="mx-2 border text-center w-8" type="text" value="{{ $each['quantity'] }}" disabled>
                       <form method="post" action="{{ route('increaseQuantity')}}">
                           @csrf
                           <input name="maVe" type="hidden" value="{{ $maVe }}">
                           <button>
                               <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                   <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                               </svg>
                           </button>
                       </form>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ number_format($each['gia'], 0, ',', '.')  . ' VNĐ' }}</span>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ number_format($each['gia'] * $each['quantity'], 0, ',', '.')  . ' VNĐ' }} VNĐ</span>
                    @php $tongTien += $each['gia'] * $each['quantity']  @endphp
                </div>
            @endforeach
            <a href="{{ route('index')}}#dichVu" class="flex font-semibold text-indigo-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                Tiếp Tục Chọn Dịch Vụ
            </a>
            @else
                <h1 class="font-semibold text-2xl text-center mt-8">Chưa Có Dịch Vụ Nào Trong Giỏ.</h1>
                <a href="{{ route('index')}}#dichVu" class="flex font-semibold text-indigo-600 text-sm mt-32">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Tiếp Tục Chọn Dịch Vụ
                </a>
            @endif
        </div>

        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Thông Tin Mua Hàng</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">SL Dịch Vụ: {{ !empty($cart) ? count($cart) : 'Trống'}}</span>
            </div>
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Tổng Tiền</span>
                    <span>{{ !empty($cart) ? number_format($tongTien, 0, ',', '.') : '0'}} VNĐ</span>
                </div>
                <form action="{{ url('/vnpay_payment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{!empty($cart) ? $tongTien : '0'}}">
                    <button name="redirect" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full" type="submit">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
