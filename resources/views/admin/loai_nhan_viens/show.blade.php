@extends('layouts.master')
@section('content')
    <a href="{{ route('loai_nhan_viens.index') }}">
        <button class="bg-white border border-white p-2 rounded shadow-md text-gray-700 flex items-center focus:outline-none focus:shadow-outline">
            <svg width="24" height="24" viewBox="0 0 16 16">
                <path d="M9 4 L5 8 L9 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
            <span class="mx-2">Back</span>
        </button>
    </a>
<div class="p-8">
    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Thông Tin Chức Vụ Nhân Viên
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Một số thông tin về chức vụ này:
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Tên Chức vụ
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $loai_nhan_vien->tenLoai }}
                    </dd>
                </div>


                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Lương Cơ bản
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $loai_nhan_vien->getLuongFormattedAttribute }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
