<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Quản trị viên</title>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
<style>
    *{font-family: 'Play', sans-serif}
</style>
</head>

<body >
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: rgb(0, 102, 128)">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav font-weight-bold">
                <li class="nav-item">
                    <a class="btn mr-2 btn-info" href="{{ url('/')}}">Trang chủ <i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-info" href="{{ url('/admin/logout_admin')}}">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul> 
        </div>
    </nav>
    <div class="d-flex">
        <div class="alert-info">
            <div class="list-group" style="width:150px">
                <a href="{{ route('thongke') }}" class="list-group-item list-group-item-action list-group-item-info">Thống kê </a>
                <a href="{{ route('loaisanpham.index') }}" class="list-group-item list-group-item-action list-group-item-info">Loại sản phẩm</a>
                <a href="{{ route('sanpham.index') }}" class="list-group-item list-group-item-action list-group-item-info">Sản phẩm</a>
                <a href="{{ route('donhang') }}" class="list-group-item list-group-item-action list-group-item-info">Đơn hàng</a>
                <a href="{{ route('slider.index') }}" class="list-group-item list-group-item-action list-group-item-info">Slider</a>
                <a href="{{ route('khachhang') }}" class="list-group-item list-group-item-action list-group-item-info">Users</a>
                <a href="{{ route('admin') }}" class="list-group-item list-group-item-action list-group-item-info">Admin</a>
              </div>
        </div>
        <div class="flex-grow-1">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="p-2 text-center alert-secondary">Copyright © 2021 TRI - Bán máy quạt siêu cấp</div>
</body>
</html>
