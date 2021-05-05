@extends('admin.layout')
@section('content')
  <div style="width:600px;margin-left:100px">
    <h1 class="display-4">Sửa sản phẩm</h1>
      <form action="{{ route('sanpham.update',$data->id_sanpham) }}" method="post" enctype="multipart/form-data">@csrf @method('put')
        
        <input class="form-control" value="{{ $data->name_sanpham }}" type="text" placeholder="Tên sản phẩm" name="ipname" required><br/>
        <select class="form-control" name="iploaisp">
            @foreach ($data2 as $x)
            <option value="{{ $x->id_loaisanpham }}">{{ $x->name_loaisanpham }}</option>
            @endforeach
        </select><br>
        <input class="form-control" value="{{ $data->price_sanpham }}" type="number" placeholder="Giá bán" name="ipgiaban" required><br/>
        <input class="form-control" value="{{ $data->amount_sanpham }}" type="number" name="ipsl" required><br/>
        {{-- <input class="form-control" value="{{ $data->discount_sanpham }}" type="number" placeholder="Giảm giá" name="ipgiamgia"><br/> --}}
        <input class="form-control" value="{{ $data->description_sanpham }}" row="5" type="text" placeholder="Mô tả" name="ipmota"><br/>
        
        <input class="btn btn-info" type="submit" value="Lưu lại">
      </form>
  </div><br>
@endsection