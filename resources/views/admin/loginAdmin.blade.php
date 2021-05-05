<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng nhập vào Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
<style>
    *{font-family: 'Play', sans-serif}
</style>
</head>
<body>
    <div style="height:100vh ;background-image:url('{{ asset('gn.png') }}');background-size:cover"
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
            <form action="{{ url('/xuly_login_admin')}}" method="POST">@csrf
                <input class="form-control mb-3" type="text" placeholder="Tài khoản" name="em" required>
                <input class="form-control mb-3" type="password" placeholder="Mật khẩu" name="pw" required>
                <button type="submit" class="btn btn-danger btn-block mb-3">Đăng nhập vào Admin</button>
            </form>
           <a href="{{ url('/')}}">Trở về trang chủ</a>
            
        </div>
    </div>
</body>
</html>
    
