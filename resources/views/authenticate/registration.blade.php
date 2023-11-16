@extends('layouts.layoutLogin')
@section('title', 'Register')
@section('main')
<div class="text-center flex justify-center items-center">
  <form action="{{route('register')}}" method="POST">
    @csrf

    <div>
      <div class='flex justify-center items-center'>
        <img class="w-32" src="https://inkythuatso.com/uploads/images/2021/09/vinpearl-logo-inkythuatso-1-13-10-21-19.jpg" alt="Vinpearl logo">
      </div>
      <p class="text-2xl font-bold">REGISTER</p>
    </div>
    <div class="mt-5">
      <input type="text" name="name" value="" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Full name">
    </div>
    <div class="mt-5">
      <input type="email" name="email" value="" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Email">
    </div>
    @if(session('exist-email'))
    <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
      <div class="flex flex-col justify-center items-center">
        <div class="text-xl font-bold">Notification!</div>
        <div class="text-gray-600">{{session('exist-email')}}</div>
      </div>
    </div>
    @endif
    <div class="mt-5">
      <input type="password" name="password" value="" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Password">
    </div>
    <div class="mt-5">
      <input type="password" name="confirm" value="" required class="px-3 w-full h-10 border border-black rounded-lg" placeholder="Confirm your password">
      @error ('confirm')
      <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
        <div class="flex flex-col justify-center items-center">
          <div class="text-xl font-bold">Notification!</div>
          <div class="text-gray-600">{{$message}}</div>
        </div>
      </div>
      @enderror
    </div>
    @error('password')
      <div class="mt-3 bg-red-300 shadow-lg rounded-lg p-4">
        <div class="flex flex-col justify-center items-center">
          <div class="text-xl font-bold">Notification!</div>
          <div class="text-gray-600">{{$message}}</div>
        </div>
      </div>
    @enderror
    <div class="mt-5">
      By registering, I argee with Vinpearl's<br><a class="text-blue-500" href="#">Terms of Service</a> and <a class="text-blue-500" href="#">Privacy Policy</a>
    </div>
    <div class="mt-5">
      <input type="submit" name="register" value="Register" class="bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">
    </div>
    <div class="mt-5">
      You didn't have any account? <a href="{{route('show-login')}}" class="text-blue-500">Login!</a>
    </div>
  </form>
</div>
@endsection