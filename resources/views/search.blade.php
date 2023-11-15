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
    <title>Search Page</title>
</head>
<body>
@include('layouts.nav')

<div class="container mx-auto mt-6">
    <div class="grid grid-cols-2">
        <div class="border-l-4 border-blue-500 pl-6">
            <h6 class="text-blue-500 font-bold text-[20px]">DỊCH VỤ</h6>
            <h6 class="font-bold text-[25px]">DỊCH VỤ DÀNH CHO BẠN</h6>
        </div>
    
        <div>
            <form action="{{ route('search') }}" method="get" class="flex items-center space-x-4">
                <div class="flex-grow">
                    <div class="flex space-x-4"> 
                        <input class="flex-grow w-36 px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500" type="search" placeholder="Tìm kiếm" aria-label="Search" name="timKiem">
                        <button class="bg-blue-500 text-white font-bold px-4 py-2 rounded-md" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<div id="searchResults" class="mt-6 p-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-6 mt-4">
        @foreach($searchResults as $result)
            <div class="w-[450px] shadow-md rounded-lg overflow-hidden">
                <div class="h-[250px]">
                    <img class="h-[250px] w-full" src="/storage/images/service_pic/{{ $result->maDV }}/{{ $result->anh }}" alt="{{ $result->tenDV }}">
                </div>
                <div class="text-center">
                    <p class="font-bold text-lg mt-2">{{ $result->tenDV }}</p>
                    <a href="{{ route('show', $result->maDV) }}" class="mb-4 duration-300 inline-flex items-center text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 mt-2">
                        Xem Chi Tiết
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-6 px-2 flex justify-center items-center">
        {!! $searchResults->appends(['timKiem' => request('timKiem')])->links('layouts.pagination') !!}
    </div>
</div>


</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam = urlParams.get('page');
        if (pageParam && parseInt(pageParam) >= 1) {
            window.location.hash = 'searchResults';
            document.getElementById('searchResults').scrollIntoView();
        }
    });
</script>
</html>
