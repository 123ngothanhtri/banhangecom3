@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Sản phẩm</p>
    <div class="d-flex justify-content-between">
        <form class="form-inline" action="{{ url('timkiem')}}" method="post">@csrf
            <input class="form-control mr-2" style="width:300px" type="text" placeholder="Tìm kiếm sản phẩm"
                name="timkiem">
            <input class="btn btn-info" type="submit" value="Tìm kiếm">
        </form>
        <a class="btn btn-info" href="{{ route('sanpham.index') }}">Trở lại</a>    
    </div>
    <p>Có <code>{{ count($data) }}</code> kết quả tìm kiếm với từ khóa: <code>{{ $tukhoa }}</code></p>
    <table class="table table-hover table-sm table-bordered">
        <tr class="font-weight-bold table-info">
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Loại sản phẩm</td>
            <td>Giá bán</td>
            <td>Giảm giá</td>
            <td>Hình ảnh</td>
            <td>Mô tả</td>
            <td>Ngày thêm</td>
            <td>Thao tác</td>
        </tr>
        @foreach ($data as $sp)
            <tr>
                <td>{{ $sp->id_sanpham }}</td>
                <td>{{ $sp->name_sanpham}}</td>
                <td>{{ $sp->name_loaisanpham}}</td>
                <td>{{ $sp->price_sanpham }}</td>
                <td>{{ $sp->discount_sanpham }}</td>
                <td><img height="50px" src="{{ asset('images/'.$sp['image_sanpham']) }}"></td>
                <td>{{ $sp->description_sanpham }}</td>
                <td>{{ $sp->created_at }}</td>
                <td>
                    <form action="{{ route('sanpham.destroy',$sp->id_sanpham) }}" method="post">@csrf @method('delete')
                        <button type="submit" onclick="return confirm('Xóa thật chứ ?');" class="btn btn-sm btn-outline-danger mb-1">Xóa</button>
                    </form>
                    <form action="{{ route('sanpham.edit',$sp->id_sanpham) }}" method="get">@csrf
                        <button type="submit" class="btn btn-sm btn-outline-info">Sửa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

    
    