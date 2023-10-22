<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="https://statics.vinpearl.com/favicon.png" type="image/png">
    <title>Dashboard - Vinpearl</title>
    <link rel="stylesheet" href="{{ asset('css/Bootstrap_v5.2.3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailUser.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="">Quản Lý Vinpearl
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 ms-3"
                id="sidebarToggle"
                href="#!"> <i class="fas fa-bars"></i>
        </button>
    </a>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto">
        <li class="text-light my-auto fw-bold">Session Email</li>
    </ul>
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link " href="">
                        <i class="fas fa-lg fa-tachometer-alt"></i>
                        <span class="ms-2">Trang Chủ</span>
                    </a>
                    <a class="nav-link" href="">
                        <i class="fas fa-lg fa-users"></i>
                        <span class="ms-2">Khách Hàng</span>
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNhanVien" aria-expanded="false" aria-controls="collapseLayouts">
                        <i class="fa-solid fa-lg fa-user-group"></i>
                        <span class="ms-2">Nhân Viên</span>
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                        </div>
                    </a>
                    <div class="collapse" id="collapseNhanVien" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="">Nhân Viên</a>
                            <a class="nav-link" href="">Loại Nhân Viên</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDichVu" aria-expanded="false" aria-controls="collapseLayouts">
                        <i class="fa-solid fa-lg fa-list"></i>
                        <span class="ms-2">Dịch Vụ</span>
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg><!-- <i class="fas fa-angle-down"></i> Font Awesome fontawesome.com -->
                        </div>
                    </a>
                    <div class="collapse" id="collapseDichVu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion" style="">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="">Dịch Vụ</a>
                            <a class="nav-link" href="">Loại Dịch Vụ</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-lg fa-ticket"></i>
                        <span class="ms-2">Vé</span>
                    </a>
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-lg fa-file-invoice-dollar"></i>
                        <span class="ms-2">Hoá Đơn</span>
                    </a>
                    <a class="nav-link" href="">
                        <i class=" fa-solid fa-lg fa-file-invoice-dollar"></i>
                        <span class="ms-2">Chi Tiết Hoá Đơn</span>
                    </a>
                    <a class="nav-link" href="">
                        <i class="fa-solid fa-lg fa-money-check-dollar"></i>
                        <span class="ms-2">Số Ca</span>
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">User đang đăng nhập:</div>
                <span class="fw-bold">Session Name</span>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content" class="scrollable-container">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/toggleSideBar.js') }}"></script>
</body>
</html>
