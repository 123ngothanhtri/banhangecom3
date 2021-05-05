@extends('home.layout')
@section('content')
    <div style="height:90vh; background-image:url('{{ asset('ggg.png') }}'); background-size:cover"
        class="d-flex justify-content-center align-items-center">     
        <div class="bg-light rounded-lg shadow p-4" style="width:400px; ">
            <div class="d-flex justify-content-center">
                <a href="/"><img height="50px" src="https://shinonomestory.com/wp-content/uploads/2020/10/genshin_impact_logo_black.png"></a>
            </div>
            @if (session('er'))
                <div class="alert alert-danger">{{ session('er') }}</div>
            @endif
            @if (session('msg'))
                <div class="alert alert-info">{{ session('msg') }}</div>
            @endif
            <form action="{{ url('/xuly_login_user')}}" method="POST">@csrf
                <input class="form-control mb-3" type="text" placeholder="Tài khoản" name="em" required>
                <input class="form-control mb-3" type="password" placeholder="Mật khẩu" name="pw" required>
                <button type="submit" class="btn btn-dark btn-block">Đăng nhập</button>
            </form>
            <hr>
            <a class="btn btn-outline-dark" href="{{ url('/register_user')}}">Đăng ký</a>
        </div>
    </div>

@endsection