@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Danh sách loại máy quạt</p>
    @if (session('msg_delete'))
        <div class="alert alert-danger">
          <i class="fas fa-exclamation-triangle"></i> {{session('msg_delete')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#myModal">
        Thêm loại máy quạt 
      </button>
      <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Thêm loại sản phẩm</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('loaisanpham.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <input class="form-control" type="text" placeholder="Tên loại sản phẩm" name="ipname" required autofocus><br/>
                    <input class="btn btn-sm btn-info" type="submit" value="Thêm">
                  </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
    <table class="table table-hover table-bordered table-sm">
        <tr class="font-weight-bold table-info">
            <td>Mã loại sản phẩm</td>
            <td>Tên loại sản phẩm</td>
            <td>Thao tác</td>
        </tr>
        @foreach ($data as $x)
            <tr>
                <td>{{ $x->id_loaisanpham }}</td>
                <td>{{ $x->name_loaisanpham }}</td>
                <td>
                  <form action="{{ route('loaisanpham.destroy',$x->id_loaisanpham) }}" method="post">@csrf @method('delete')
                    <button type="submit" onclick="return confirm('Sẽ xóa tất cả sản phẩm thuộc loại này. Xóa thật chứ ?');" class="btn btn-sm btn-outline-danger">Xóa</button> 
                  <a href="{{route('loaisanpham.edit',$x->id_loaisanpham)}}" class="btn btn-sm btn-outline-info">Sửa</a>
                  </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
