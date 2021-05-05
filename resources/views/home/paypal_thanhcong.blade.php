@extends('home.layout')
@section('content')
<div class="container">
    <div class="jumbotron alert-success text-center">
    <h1><i class="fab fa-cc-paypal"></i></h1>
    <h1> Thanh toán qua Paypal thành công <i class="far fa-thumbs-up"></i></h1>
    </div>
    <a class="btn btn-info btn-block" href="{{ url('/')}}"><i class="fas fa-shopping-cart"></i> Tiếp tục mua sắm <i class="fas fa-angle-double-right"></i></a><br>
</div>
@endsection
