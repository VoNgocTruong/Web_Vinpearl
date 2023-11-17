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
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$name}}</h1>
                    <!--
                        
                        ẢNH SIÊU TO KHỔNG LỒ HERE!
                        
                    -->
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Hạng thành viên</span>
                            <span class="ml-auto"><span
                                    class="bg-amber-400 py-1 px-2 rounded text-white text-sm">VIP</span></span>
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
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Thông tin</span>
                    </div>
                    <form action="{{route('update-profile')}}" method="post">
                        @csrf
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-3 font-semibold">Tên</div>
                                    @if(Auth::User()->admin == 0)
                                    <input type="text" name="hoTenKH" required class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->hoTenKH}}">
                                    @else
                                    <input type="text" name="hoTenKH" required class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->name}}">
                                    @endif
                                </div>
                                @if (Auth::User()->admin == 0)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Ngày sinh</div>
                                        <input type="date" name="ngaySinh" class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->ngaySinh}}">
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Giới tính</div>
                                        <select class="px-3 w-full h-10 border border-gray-400 rounded-lg">
                                            <option value="1" selected>Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Địa chỉ</div>
                                        <input type="text" name="diaChi" class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->diaChi}}">
                                    </div>
                                @endif
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-3 font-semibold">Email</div>
                                    <input type="email" name="email" disabled class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->email}}">
                                </div>
                                @if (Auth::User()->admin == 0)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Số điện thoại</div>
                                        <input type="text" name="sdt" pattern="[0-9]{10}" class="px-3 w-full h-10 border border-gray-400 rounded-lg" placeholder="{{$user->sdt}}">
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                        <div class="my-4 flex justify-center items-center">
                            <input type="submit" name="login" value="Cập nhật thông tin" class="bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">
                            <div class="mx-3"></div>
                            <a href="{{route('show-profile')}}" class="text-center bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">Hủy</a>
                        </div>
                    </form>

                </div>
                <!-- End of about section -->
            </div>
        </div>
    </div>
</div>
@endsection