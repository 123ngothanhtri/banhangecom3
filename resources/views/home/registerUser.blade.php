@extends('home.layout')
@section('content')
    <div style="width:100%;height:90vh" class="d-flex justify-content-center align-items-center"> 
        @if (session('er'))
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{session('er')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
        @endif
        @if (session('msg'))
            <div class="mb-0 btn alert-success"><i class="far fa-check-circle"></i> {{ session('msg') }}</div>
        @endif
        <form style="width:500px" action="{{ url('/xuly_register_user')}}" method="post">@csrf
            <h2 class="text-center">Đăng ký</h2>
            <input type="text" class="form-control" placeholder="Họ tên" name="hoten" required min="3" max="30" autocomplete="on">
            @error('hoten')<code>{{ $message }}</code>@enderror <br>
            <input type="email" class="form-control " placeholder="Email" name="email" required min="5" max="90" autocomplete="on">
            @error('email')<code>{{ $message }}</code>@enderror <br>
            <input type="number" class="form-control" placeholder="Số điện thoại" name="sdt" required min="10" maxlength="30" autocomplete="on">
            <br>
            <input type="date" class="form-control"  name="ngaysinh" max="2015-01-01">
            <br>
            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required min="10" autocomplete="on">
            <br>
            <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" value="Nam" name="gioitinh" checked>Nam
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" value="Nữ" name="gioitinh">Nữ
                </label>
              </div>
              <br><br>

            <input type="password" class="form-control" placeholder="Mật khẩu" name="pwd" required min="3" max="30" ><br>
            @error('pwd')<code>{{ $message }}</code>@enderror <br>
            <button type="submit" class="btn btn-dark btn-block mb-3">Đăng ký</button>
            <p style="font-size:11px">Bằng cách nhấp vào Đăng ký, bạn đồng ý với Điều khoản, Chính sách dữ liệu và Chính sách cookie của chúng tôi.</p>
            <p>Bạn đã là thành viên? <a href="{{ url('/login_user')}}">Đăng nhập tại đây</a></p>
        </form>
    </div>
</body>
</html>
@endsection