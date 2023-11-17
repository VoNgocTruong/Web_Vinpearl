@extends('layouts.master')
@section('content')
    <a href="{{ route('dich_vus.index') }}">
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
                <h3 class="font-semibold text-black" style="font-size: 24px;">Thêm Dịch Vụ Mới</h3>
            </div>
            <form action="{{ route('dich_vus.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Tên Dịch Vụ <span class="text-meta-1">*</span>
                        </label>
                        <input name="tenDV" value="{{ old('tenDV') }}" type="text" placeholder="Nhập tên dịch vụ" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('tenDV'))
                            <span class="text-red-500">{{ $errors->first('tenDV') }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Ảnh
                        </label>
                        <div>
                            <input name="anh" type="file" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @if($errors->has('anh'))
                                <span class="text-red-500">{{ $errors->first('anh') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Số Điện Thoại Dịch Vụ <span class="text-meta-1">*</span>
                        </label>
                        <input name="sdtDV" value="{{ old('sdtDV') }}" type="text" placeholder="Nhập số điện thoại dịch vụ" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('sdtDV'))
                            <span class="text-red-500">{{ $errors->first('sdtDV') }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Địa Chỉ Dịch Vụ
                        </label>
                        <textarea name="diaChiDV" rows="2" placeholder="Nhập địa chỉ dịch vụ" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">{{ old('diaChiDV') }}</textarea>
                        @if($errors->has('diaChiDV'))
                            <span class="text-red-500">{{ $errors->first('diaChiDV') }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Xếp Loại
                        </label>
                        <input name="xepLoai" value="{{ old('xepLoai') }}" type="text" placeholder="Nhập xếp loại" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('xepLoai'))
                            <span class="text-red-500">{{ $errors->first('xepLoai') }}</span>
                        @endif
                    </div>
                    <div class="mb-5 relative z-20 bg-transparent">
                        <label class="mb-2.5 block text-black font-bold">
                            Loại Dịch vụ
                        </label>
                        <select name="maLoaiDV" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                            @foreach($loai_dich_vus as $ldv)
                                <option value="{{ $ldv->maLoaiDV }}" @if(old('maLoaiDV') == $ldv->maLoaiDV) selected @endif>{{ $ldv->tenLoai }}</option>
                            @endforeach
                        </select>
                        <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                            </g>
                            </svg>
                        </span>
                        </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Mô Tả
                        </label>
                        <textarea name="moTa" rows="2" placeholder="Nhập mô tả" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">{{ old('moTa') }}</textarea>
                        @if($errors->has('moTa'))
                            <span class="text-red-500">{{ $errors->first('moTa') }}</span>
                        @endif
                    </div>

                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white transition duration-300 hover:bg-[#0B5ED7]">
                        Thêm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection