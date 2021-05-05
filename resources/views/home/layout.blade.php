<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Bán máy quạt</title>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">
	<link rel="stylesheet" href="{{ asset('css/owl-carousel.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <nav class="nav-nav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo-genshin">
            <a href="{{ url('/login_admin') }}"><img height="50px" src="{{ asset('logoge.png') }}"></a>
        </label>
        <ul class="nav-ul">
          <li class="nav-li"><a class="nav-a btn btn-info" href="{{ url('/') }}">Trang chủ</a></li>
          <li class="nav-li"><a class="nav-a btn btn-info" href="{{ url('/gioithieu') }}">Giới thiệu</a></li>
          <li class="nav-li"><a class="nav-a btn btn-info" href="#">Liên hệ</a></li>
          <li class="nav-li"><a class="nav-a btn btn-info" href="{{ url('/login_user') }}">Đăng nhập</a></li>
        </ul>
      </nav>
      <section>
        <div style="margin-top:70px">
            @yield('content')
        </div>
      </section>
    
    <footer class="alert-secondary text-center text-lg-start" style="background-color:rgb(156, 156, 156)">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5>Thông tin liên hệ</h5>
                    <p>Địa chỉ: Quốc lộ 1A xã Phú Quới huyện Long Hồ tỉnh Vĩnh Long Địa chỉ: Quốc lộ 1A xã Phú Quới huyện Long Hồ tỉnh Vĩnh Long Địa chỉ: Quốc lộ 1A xã Phú Quới huyện Long Hồ tỉnh Vĩnh Long</p>
                 </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5>Menu</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a class="text-dark" href="{{ url('/') }}">Trang chủ</a>
                        </li>
                        <li>
                            <a class="text-dark" href="{{ url('/gioithieu') }}">Giới thiệu</a>
                        </li>
                        <li>
                            <a class="text-dark" href="{{ url('/profile_user') }}">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-0">Liên hệ với chúng tôi</h5>
                    <ul class="list-unstyled">
                        <li><a>Email: 123ngothanhtri@gmail.com</a></li>
                        <li><a>Số điện thoại: 0589080900 </a></li>
                        <li><a>Facebook Zalo Instagram</a></li>
                    </ul>
                    <h5><i class="fab fa-facebook-square"></i>
                    <i class="fab fa-facebook-messenger"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-tiktok"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-twitter"></i></h5>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <p>Copyright © 2021 TRI - Bán máy quạt siêu cấp</p>
        </div>
    </footer>


    <script src="{{ asset('js/jquery.js')}}"></script>
	<script src="{{ asset('js/bootstrap.js')}}"></script>
	<script src="{{ asset('js/owl-carousel.js')}}"></script>
    @yield('script')
</body>

</html>
