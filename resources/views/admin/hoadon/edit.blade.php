@extends('layouts.master')
@section('content')
    <a href="{{ route('cthd.index') }}">
        <button class="bg-white border border-white p-2 rounded shadow-md text-gray-700 flex items-center focus:outline-none focus:shadow-outline">
            <svg width="24" height="24" viewBox="0 0 16 16">
                <path d="M9 4 L5 8 L9 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
            <span class="mx-2">Back</span>
        </button>
    </a>
    <div class="w-2/4 mx-auto pt-2">
        <div class="rounded-sm border border-stroke bg-white shadow-default p-4">
            <div class="border-b border-stroke py-4 px-6.5">
                <h3 class="font-semibold text-black">
                    SỬA THÔNG TIN ĐƠN HÀNG
                </h3>
            </div>
            <form action="{{ route('cthd.update', $cthd->maHD) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Mã Hóa đơn <span class="text-meta-1">*</span>
                            </label>
                            <input name="maHD" value="{{ old('maHD', $cthd->maHD) }}" type="text" placeholder="Nhập mã hóa đơn" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('maHD')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Mã Vé <span class="text-meta-1">*</span>
                            </label>
                            <input name="maVe" value="{{ old('maVe', $cthd->maVe) }}" type="text" placeholder="Nhập mã vé" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('maVe')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Email <span class="text-meta-1">*</span>
                            </label>
                            <input name="email" value="{{ old('email', $hoadon->email) }}" type="text" placeholder="Nhập số lượng" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Số Điện Thoại <span class="text-meta-1">*</span>
                            </label>
                            <input name="SDT" value="{{ old('SDT', $hoadon->SDT) }}" type="text" placeholder="Nhập đơn giá" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('SDT')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Số lượng <span class="text-meta-1">*</span>
                            </label>
                            <input name="soLuong" value="{{ old('soLuong', $cthd->soLuong) }}" type="text" placeholder="Nhập số lượng" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('soLuong')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Đơn giá <span class="text-meta-1">*</span>
                            </label>
                            <input name="giaTien" value="{{ old('giaTien', $cthd->giaTien) }}" type="text" placeholder="Nhập đơn giá" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @error('giaTien')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white transition duration-300 hover:bg-[#0B5ED7]">
                        Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
