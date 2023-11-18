<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tệp</title>
</head>
<body>
<div class="container m-8">
    <p class="font-bold text-xl">Các Tệp Trong Thư Mục</p>
    @foreach($fileNames as $fileName)
        <a class="underline text-blue-500" href="{{ route('showFileContent', ['id' => $id, 'levelTwoFolder' => $levelTwoFolder, 'fileName' => $fileName]) }}">{{ $fileName }}</a><br>
    @endforeach
</div>
</body>
</html>
