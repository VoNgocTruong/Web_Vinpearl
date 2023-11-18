<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        current: 'currentColor',
                        transparent: 'transparent',
                        white: '#FFFFFF',
                        'black-2': '#010101',
                        bodydark: '#AEB7C0',
                        bodydark1: '#DEE4EE',
                        bodydark2: '#8A99AF',
                        primary: '#3C50E0',
                        secondary: '#80CAEE',
                        stroke: '#E2E8F0',
                        graydark: '#333A48',
                        whiten: '#F1F5F9',
                        whiter: '#F5F7FD',
                        boxdark: '#24303F',
                        'boxdark-2': '#1A222C',
                        strokedark: '#2E3A47',
                        'form-strokedark': '#3d4d60',
                        'form-input': '#1d2a39',
                        'meta-1': '#DC3545',
                        'meta-2': '#EFF2F7',
                        'meta-3': '#10B981',
                        'meta-4': '#313D4A',
                        'meta-5': '#259AE6',
                        'meta-6': '#FFBA00',
                        'meta-7': '#FF6766',
                        'meta-8': '#F0950C',
                        'meta-9': '#E5E7EB',
                        success: '#219653',
                        danger: '#D34053',
                        warning: '#FFA70B',
                    }
                }
            }
        }
    </script>
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.nav')
    @yield('main')
</body>
</html>