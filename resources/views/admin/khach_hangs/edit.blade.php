@extends('layouts.master')
@section('content')
    <a href="{{ route('khach_hangs.index') }}">
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
                    Sửa Thông Tin Khách Hàng
                </h3>
            </div>
            <form action="{{ route('khach_hangs.update', $khach_hang) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Họ Và Tên <span class="text-meta-1">*</span>
                            </label>
                            <input name="hoTenKH" value="{{ old('hoTenKH', $khach_hang->hoTenKH) }}" type="text" placeholder="Nhập họ và tên của bạn" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @if($errors->has('hoTenKH'))
                                <span class="text-red-500">{{ $errors->first('hoTenKH') }}</span>
                            @endif
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Số Điện Thoại <span class="text-meta-1">*</span>
                            </label>
                            <input name="sdt" value="{{ old('sdt', $khach_hang->sdt) }}" type="text" placeholder="Nhập số điện thoại" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @if($errors->has('sdt'))
                                <span class="text-red-500">{{ $errors->first('sdt') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black font-bold">
                            Email <span class="text-meta-1">*</span>
                        </label>
                        <input name="email" value="{{ old('email', $khach_hang->email) }}" type="email" placeholder="Nhập email của ban" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('email'))
                            <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>


                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="block text-black font-bold">
                                Ngày Sinh
                            </label>
                            <div class="relative max-w-sm">
                                <div class="relative top-7 items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input value="{{ old('ngaySinh', $khach_hang->getNgaySinh) }}" datepicker datepicker-format="dd/mm/yyyy" name="ngaySinh" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date">
                                @if($errors->has('ngaySinh'))
                                    <span class="text-red-500">{{ $errors->first('ngaySinh') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Giới Tính
                            </label>
                            <div class="relative z-20 bg-transparent">
                                <select name="gioiTinh" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                                    <option value="1" @if(old('gioiTinh', $khach_hang->gioiTinh) == 1) selected @endif>Nam</option>
                                    <option value="0" @if(old('gioiTinh', $khach_hang->gioiTinh) == 0) selected @endif>Nữ</option>
                                    <option value="2" @if(old('gioiTinh', $khach_hang->gioiTinh) == 2) selected @endif>Không muốn trả lời</option>
                                </select>
                                <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g opacity="0.8">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                              </g>
                            </svg>
                          </span>
                            </div>
                            @if($errors->has('gioiTinh'))
                                <span class="text-red-500">{{ $errors->first('gioiTinh') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Ảnh
                            </label>
                            <div>
                                <input value="{{ old('anh', $khach_hang->anh) }}" name="anh" type="file" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                                @if($errors->has('anh'))
                                    <span class="text-red-500">{{ $errors->first('anh') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="mb-2.5 block text-black font-bold">
                            Địa Chỉ
                        </label>
                        <textarea name="diaChi" rows="2" placeholder="Nhập địa chỉ của bạn" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">{{ old('diaChi', $khach_hang->diaChi) }}</textarea>
                        @if($errors->has('diaChi'))
                            <span class="text-red-500">{{ $errors->first('diaChi') }}</span>
                        @endif
                    </div>
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white transition duration-300 hover:bg-[#0B5ED7]">
                        Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection