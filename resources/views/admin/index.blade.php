@extends('layouts.master')
@section('content')
@php
    $totalUser = \App\Models\KhachHang::count();
    $totalDV = \App\Models\DichVu::count();
    $totalOrder = \App\Models\HoaDon::count();
    $totalVe = \App\Models\Ve::count();
@endphp
<div class="container px-6 py-8 mx-auto">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">TRANG CHỦ</h3>

        <div class="mt-4 flex flex-wrap -mx-6">
            <!-- Hiển thị số liệu cho User -->
            <div class="w-full sm:w-1/2 xl:w-1/4 px-6 mb-6">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                        <!-- Icon -->
                        <i class="fas fa-user text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalUser }}</h4>
                        <div class="text-gray-500"><b>KHÁCH HÀNG</b></div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị số liệu cho Service -->
            <div class="w-full sm:w-1/2 xl:w-1/4 px-6 mb-6">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full">
                        <!-- Icon -->
                        <i class="fas fa-star text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalDV }}</h4>
                        <div class="text-gray-500"><b>DỊCH VỤ</b></div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị số liệu cho Order -->
            <div class="w-full sm:w-1/2 xl:w-1/4 px-6 mb-6">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
                        <!-- Icon -->
                        <i class="fas fa-shopping-cart text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalOrder }}</h4>
                        <div class="text-gray-500"><b>ĐƠN HÀNG</b></div>
                    </div>
                </div>
            </div>

            <!-- Hiển thị số liệu cho Ticket -->
            <div class="w-full sm:w-1/2 xl:w-1/4 px-6 mb-0">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="p-3 bg-yellow-600 bg-opacity-75 rounded-full">
                        <!-- Icon -->
                        <i class="fas fa-ticket-alt text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalVe }}</h4>
                        <div class="text-gray-500"><b>VÉ</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
