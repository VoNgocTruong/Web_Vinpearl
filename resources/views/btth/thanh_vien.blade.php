<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Thành Viên</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: stretch;
        }

        .member-card {
            flex: 0 0 calc(33.33% - 32px); /* Điều chỉnh kích thước chiều rộng của card */
            margin: 16px;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .member-card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .member-details {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .member-tasks {
            font-size: 16px;
        }

        /* Media query để điều chỉnh kích thước card trên màn hình nhỏ */
        @media (max-width: 768px) {
            .member-card {
                flex: 0 0 calc(50% - 32px);
            }
        }
    </style>
</head>
<body>
<div class="member-card cursor-pointer">
    <a href="{{ route('showLevelTwoDirectories', 1) }}">
        <img src="http://web_vinpearl.test/storage/images/member/1.jpg" alt="Avatar">
        <div class="member-details">
            Thành viên 1: Võ Ngọc Trường - 62132501
        </div>
    </a>
</div>

<div class="member-card cursor-pointer">
    <a href="{{ route('showLevelTwoDirectories', 2) }}">
        <img src="http://web_vinpearl.test/storage/images/member/2.jpg" alt="Avatar">
        <div class="member-details cursor-pointer">
            Thành viên 2: Nguyễn Hoài Duy - 62130336
        </div>
    </a>
</div>
<div class="member-card cursor-pointer">
    <img src="http://web_vinpearl.test/storage/images/member/3.jpg" alt="Avatar">
    <div class="member-details">
        Thành viên 3: Đặng Trúc Ly - 62131061
    </div>
</div>
<div class="member-card cursor-pointer">
    <img src="http://web_vinpearl.test/storage/images/member/4.jpg" alt="Avatar">
    <div class="member-details">
        Thành viên 4: Trần Lê Quang Minh - 62131114
    </div>
</div>
<div class="member-card cursor-pointer">
    <img src="http://web_vinpearl.test/storage/images/member/5.jpg" alt="Avatar">
    <div class="member-details">
        Thành viên 5: Nguyễn Hoàng Duy - 62130337
    </div>
</div>
</body>
</html>
