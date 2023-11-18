<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Thông Tin Cá Nhân</title>
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
    @include('layouts.nav') <!-- Include your navigation bar if you have one -->

    <!-- Personal information section -->
    @foreach($members as $member)
    <div class="member-card">
        <img src="{{ asset('storage/images/member/' . $member['id'] . '.jpg') }}" alt="Avatar">
        <div class="member-details">
            Thành viên {{ $member['id'] }}: {{ $member['name'] }} - {{ $member['studentId'] }}
        </div>
        <div class="member-tasks">
            Công việc: {{ $member['tasks'] }}
        </div>
    </div>
    @endforeach
</body>
</html>
