@extends('home.layout')
@section('content')
<div class="container">
    <div class="jumbotron alert-success text-center">
    <h1>Đặt hàng thành công <i class="far fa-thumbs-up"></i></h1>
    <h4>Chúng tôi sẽ liên hệ với bạn để giao hàng</h4>
    </div>
    <a class="btn btn-info btn-block" href="{{ url('/')}}"><i class="fas fa-shopping-cart"></i> Tiếp tục mua sắm <i class="fas fa-angle-double-right"></i></a><br>
</div>
@endsection
