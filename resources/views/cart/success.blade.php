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
        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor"
                  d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Thanh Toán Thành Công!</h3>
            <p class="text-gray-600 my-2">Cảm ơn bạn đã mua hàng.</p>
            <p>Sẽ tự động đưa bạn quay về trang để xem hoá đơn sau <span id="countdown">5</span> giây!</p>
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
