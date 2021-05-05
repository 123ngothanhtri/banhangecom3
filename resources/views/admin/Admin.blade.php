@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Thông tin quản trị viên</p>
    <h5>Tên: {{ $ad->name }}</h5>
    <h5>Email: {{ $ad->email }}</h5>
    <hr>
    {{-- <p>Đổi mật khẩu</p>
    @if (session('ss'))
        <h6><code>{{ session('ss') }}</code></h6>
    @endif
    <form action="/admin/doimatkhau" method="POST">@csrf
        <input type="hidden" value="{{ $ad->id }}" name="ipid">
        <input class="mb-1" type="text" placeholder="Mật khẩu cũ" name="ipmkc" required><br>
        <input class="mb-3 form-control" style="width: 300px" type="text" placeholder="Nhập mật khẩu mới" name="ipmkm"
            required>
        <button type="submit" class="btn btn-dark">Đổi</button>
    </form> --}}
@endsection
