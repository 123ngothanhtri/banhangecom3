@extends('home.layout')
@section('content')
<div class="container">
<div>
    <p class="display-4 ">Thông tin tài khoản </p>
    @if (session('msg'))
        <div class="alert alert-success"><i class="fas fa-dragon"></i> {{session('msg')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <div class="d-flex border justify-content-between rounded-lg w-75">
        <div class="m-3">
            <i style="font-size: 100px" class="fas fa-user"></i>
        </div>
        <div class="m-3">
            <p>Xin chào <strong>{{ $uu->name }}</strong> !</p>
            <p>Email: <strong>{{$uu->email }}</strong></p>
            <p>SĐT: <strong>{{$uu->sdt }}</strong></p>
            <p>Ngày sinh: <strong>{{$uu->ngaysinh }}</strong></p>
            <p>Giới tính: <strong>{{$uu->gioitinh }}</strong></p>
            <p>Địa chỉ giao hàng: <strong>{{$uu->diachi }}</strong></p>
        </div> 
        <button class="btn btn-sm btn-outline-success m-2 align-self-start " data-toggle="modal" data-target="#myModal">
            Thay đổi thông tin
        </button>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Thay đổi thông tin</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ url('/change_info_user')}}" method="post" enctype="multipart/form-data">@csrf
                        <input type="text" class="form-control" placeholder="Họ tên" name="hoten" value="{{ $uu->name }}" required min="3" max="30" autocomplete="on">
                        @error('hoten')<code>{{ $message }}</code>@enderror <br>
                        
                        <input type="number" class="form-control" placeholder="Số điện thoại" name="sdt" value="{{$uu->sdt }}" required min="10" maxlength="30" autocomplete="on">
                        <br>
                        <input type="date" class="form-control"  name="ngaysinh" value="{{$uu->ngaysinh }}" max="2010-01-02">
                        <br>
                        <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="{{ $uu->diachi }}" required min="10" autocomplete="on">
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
                        </div><br><br>
                        <input class="btn btn-info" type="submit" value="Thay đổi">
                      </form>
                </div>
                
              </div>
            </div>
          </div>
        
    </div>
    <a class="btn btn-info m-3" href="{{ url('/giohang')}}"> Xem giỏ hàng <i class="fas fa-shopping-cart"></i></a>
    <a class="btn btn-info m-3" href="{{ url('/logout_user')}}">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
</div>
</div>
@endsection
