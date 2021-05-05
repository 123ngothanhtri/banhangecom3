@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Sửa loại sản phẩm</p>
    <form action="{{ route('loaisanpham.update',$data->id_loaisanpham) }}" method="post"> @csrf @method('put')
        <input class="form-control" value="{{$data->name_loaisanpham}}" type="text" placeholder="Tên loại sản phẩm" name="ipname" required autofocus><br/>
        <input class="btn btn-info" type="submit" value="Lưu lại">
      </form>
@endsection
