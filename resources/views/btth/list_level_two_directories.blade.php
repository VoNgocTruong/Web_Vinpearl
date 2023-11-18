<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Thư Mục</title>
</head>
<body>
<div class="container m-8">
    <p class="font-bold text-xl">Thư Mục Bài Tập Của Trường</p>
    @php $stt = 0 @endphp
    @foreach($directories as $directory)
            @php
            $stt++;
            $folderName = basename($directory);
            @endphp
        <div class="ml-4">
            <span class="font-bold">{{$stt}}.</span>
            <a href="{{ route('showLevelThreeFiles', ['id' => $id, 'levelTwoFolder' => $folderName]) }}">{{ $folderName }}</a><br>
        </div>
    @endforeach
</div>
</body>
</html>
