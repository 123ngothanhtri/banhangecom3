@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Danh sách các tài khoản user</p>
    <table class="table table-hover table-bordered table-sm">
        <tr class="font-weight-bold table-info">
            <td>Mã user</td>
            <td>Tên user</td> 
            <td>SĐT</td>
            <td>Email</td>
            <td>Ngày sinh</td>
            <td>Giới tính</td>
            <td>Địa chỉ</td>
        </tr>
        @foreach ($kh as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->name }}</td>
                <td>{{ $k->sdt }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->ngaysinh }}</td>
                <td>{{ $k->gioitinh}}</td>
                <td>{{ $k->diachi}}</td>
            </tr>
        @endforeach
    </table>
    {{-- <div class="d-flex justify-content-center ">{!!$kh->links()!!}</div> --}}
@endsection
