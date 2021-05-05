@extends('admin.layout')
@section('content')

    <div class="jumbotron text-center display-4">
      <i class="far fa-chart-bar"></i> Thống kê
    </div>
    <div class="card-deck">
        <div class="card">
            <div class="card-body text-center text-danger">
                <p class="display-1">{{ count($dhcxn) }}</p>
                  <p>Đơn hàng chưa xác nhận</p>
            </div>
          </div>
        <div class="card">
          <div class="card-body text-center text-success">
              <p class="display-1 ">{{ count($dh) }}</p>
                <p>Tổng số đơn hàng</p>
          </div>
        </div>
        <div class="card">
            <div class="card-body text-center text-info">
                <p class="display-1  ">{{ count($sp) }}</p>
                  <p>Tổng số sản phẩm</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center text-secondary">
                <p class="display-1">{{ count($users) }}</p>
                  <p>Tổng số người dùng</p>
            </div>
          </div>
        <div class="card">
          <div class="card-body text-center text-warning">
              <p class="display-1 ">{{ count($lsp) }}</p>
                <p>Tổng số loại sản phẩm</p>
          </div>
        </div>
      </div>
      {{-- <img height="250px" src=""> --}}
  
@endsection
