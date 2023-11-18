@extends('layouts.layoutLogin')
@section('title', 'Đăng nhập')
@section('main')
<div class="text-center flex justify-center items-center">
  <form action="{{route('login')}}" method="POST">
    @csrf
    <div>
      <div class='flex justify-center items-center'>
        <img class="w-32" src="https://inkythuatso.com/uploads/images/2021/09/vinpearl-logo-inkythuatso-1-13-10-21-19.jpg" alt="Vinpearl logo">
      </div>
      <p class="text-2xl font-bold" >ĐĂNG NHẬP</p>
    </div>
    <div class="mt-5">
      <input type="email" name="email" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Email">
    </div>
    <div class="mt-5">
      <input type="password" name="matKhau" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Mật khẩu">
    </div>
    @if (session('login-failed'))
      <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
        <div class="flex flex-col justify-center items-center">
          <div class="text-xl font-bold">Thông báo!</div>
          <div class="text-gray-600">{{session('login-failed')}}</div>
        </div>
      </div>
    @endif
    <div class="mt-5">
      <a href="#" class="text-blue-500">Quên mật khẩu</a>
    </div>
    <div class="mt-5">
      Bạn chưa có tài khoản? <a class='text-blue-500' href="{{route('show-registration')}}">Đăng ký ở đây</a>
    </div>
    <div class="mt-5">
      <input type="submit" name="login" value="Login" class="bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">
    </div>
  </form>
</div>
@endsection
