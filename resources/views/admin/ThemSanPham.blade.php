@extends('admin.layout')
@section('content')
  <div style="width:600px">
    <p style="font-size:30px">Thêm sản phẩm</p>
    <form action="{{ route('sanpham.store') }}" method="post" enctype="multipart/form-data">@csrf
      <input class="form-control" type="text" placeholder="Tên sản phẩm" name="ipname" required><br/>
      <select class="form-control" name="iploaisp">
          @foreach ($lsp as $i)
              <option value="{{ $i->id_loaisanpham }}">{{$i->name_loaisanpham}}</option>
          @endforeach
      </select><br>
      <input class="form-control" type="number" placeholder="Giá bán" name="ipgiaban" required><br/>
      {{-- <input class="form-control" type="number" placeholder="Giảm giá" name="ipgiamgia"><br/> --}}
      <input class="form-control" type="text" placeholder="Mô tả" name="ipmota"><br/>
      <input class="form-control" type="number" placeholder="Số lượng" name="ipsl"><br/>
      
      <input type="file" class="form-control" name="ipimg"><br>
      <input class="btn btn-info" type="submit" value="Thêm">
    </form>
  </div><br>
@endsection