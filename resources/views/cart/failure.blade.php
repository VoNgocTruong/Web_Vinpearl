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
    <title>Thông Báo</title>
</head>
<body>
<div class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="bg-white w-[700px] p-6 rounded">
        <svg viewBox="0 0 24 24" class="text-red-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor" d="M19.78 5.22a1 1 0 0 0-1.41 0L12 10.59 6.64 5.22a1 1 0 0 0-1.41 1.41L10.59 12l-5.36 5.36a1 1 0 0 0 1.41 1.41L12 13.41l5.36 5.36a1 1 0 0 0 1.41-1.41L13.41 12l5.36-5.36a1 1 0 0 0 0-1.41z"/>
        </svg>
        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Thanh Toán Thất Bại!</h3>
            <p class="text-gray-600 my-2">Xin vui lòng kiểm tra lại thông tin.</p>
            <p>Sẽ tự động đưa bạn quay về trang giỏ hàng sau <span id="countdown">5</span> giây!</p>
            <div class="py-10 text-center">
                <a href="{{ route('show-profile') }}" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                    Hoặc quay về nhanh!
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var seconds = 5;
        function redirect() {
            window.location.href = '/profile';
        }
        var interval = setInterval(function() {
            $('#countdown').text(seconds);
            seconds--;
            if (seconds <= 0) {
                clearInterval(interval);
                redirect();
            }
        }, 1000);
    });
</script>
</body>
</html>
