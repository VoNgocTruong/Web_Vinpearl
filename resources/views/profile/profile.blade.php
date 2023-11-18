@extends('layouts.layoutProfile')
@section('title', 'Profile')
@section('main')
<!-- component -->
<style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>

<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3">
                    <div class="image overflow-hidden  border-b-4 border-green-400">
                        <img class="h-auto w-full mx-auto"
                            src="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAxL3JtNjA5LXNvbGlkaWNvbi13LTAwMi1wLnBuZw.png"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$name}}</h1>
                    <!--
                        
                        ẢNH SIÊU TO KHỔNG LỒ HERE!
                        
                    -->
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{$member}}</span>
                            <span class="ml-auto">
                            @if ($member == 'Thành viên')
                                <span class="bg-amber-400 py-1 px-2 rounded text-white text-sm">
                                    VIP
                                <span> 
                            @else
                                <span class="bg-blue-900 py-1 px-2 rounded text-white text-sm">
                                    ADMIN
                                <span>                                   
                            @endif
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Tài khoản từ</span>
                            <span class="ml-auto">{{$user->created_at}}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Hồ sơ -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Thông tin</span><a class='text-blue-500' href="{{route('edit-profile')}}">sửa</a>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Tên</div>
                                <div class="px-4 py-2">{{$name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Ngày sinh</div>
                                <div class="px-4 py-2">{{$user->ngaySinh}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Giới tính</div>
                                <div class="px-4 py-2">{{$gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Địa chỉ</div>
                                <div class="px-4 py-2">{{$user->diaChi}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="{{$user->email}}">{{$user->email}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Điện thoại</div>
                                <div class="px-4 py-2">{{$user->sdt}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-5"></div>
                <!-- Lịch sử mua hàng -->
                @if (Auth::User()->admin == 0)
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Lịch sử giao dịch</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-center px-6 py-3">
                                            STT
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Dịch vụ
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Số lượng
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Đơn giá
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Ngày giao dịch
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($lichSuGiaoDich as $item)
                                    <tr class="bg-white">
                                        @foreach ($cthds as $ct)
                                            @if ($ct->maHD == $item->maHD)
                                                @foreach ($ves as $ve)
                                                    @if($ve->maVe == $ct->maVe)
                                                        @foreach ($dichVus as $dichVu)
                                                            @if ($dichVu->maDV == $ve->maDV)
                                                                <td class="text-center px-6 py-4">
                                                                    {{$stt++}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{$dichVu->tenDV}}
                                                                </td>
                                                                <td class="text-center px-6 py-4">
                                                                    {{$ct->soLuong}}
                                                                </td>
                                                                <td class="text-center px-6 py-4">
                                                                    {{$ve->giaTien}}
                                                                </td>
                                                                @php
                                                                    $thanhTien = $ve->giaTien * $ct->soLuong;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        
                                        
                                        <td class="px-6 py-4 text-center">
                                            {{$item->ngayThanhToan}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-400 pb-4">
                                        <td colspan="2">

                                        </td>
                                        <td class="font-bold text-black text-l">
                                            THÀNH TIỀN:
                                        </td>
                                        <td class="text-center font-bold text-black text-l">
                                            {{$thanhTien}}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                <!-- End of about section -->

                <div class="my-4"></div>
            </div>
        </div>
    </div>
</div>
@endsection