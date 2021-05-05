@extends('admin.layout')
@section('content')
    <p style="font-size:30px">Đơn hàng</p>
    <table class="table table-hover table-sm table-bordered">
        <tr class="font-weight-bold table-info">
            <td>Mã đơn hàng</td>
            <td>Hình ảnh</td>
            <td>Tên khách hàng</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng bán</td>
            <td>Tổng tiền</td>
            <td>Địa chỉ giao hàng</td>
            {{-- <td>Email</td> --}}
            <td>SĐT</td>
            <td>Ngày đặt</td>
            <td>Trạng thái</td>
            <td>Thao tác</td>
        </tr>
        @foreach ($ctdh as $sp)
            <tr>
                <td>{{ $sp->id_donhang }}</td>
                <td><img height="50px" src="{{ asset('images/'.$sp->image_sanpham) }}"></td>
                <td>{{ $sp->name }}</td>
                <td>{{ $sp->name_sanpham }}</td>
                <td>{{ $sp->quantity }}</td>
                <td>${{ number_format($sp->total_donhang) }}</td>
                <td>{{ $sp->diachi}}</td>
                <td>{{ $sp->sdt}}</td>
                <td>{{ $sp->created_at }}</td>
                <td>
                    @if ($sp->status_donhang == 0)
                        <p class="text-danger">Chưa xác nhận</p>
                    @else
                        <p class="text-success">Đã xác nhận</p>
                    @endif
                </td>
                <td>
                    @if($sp->status_donhang == 0)
                    <a onclick="return confirm('Xác nhận thật chứ ?');" class="btn btn-sm btn-outline-info mb-1" href="{{ url('admin/xacnhanstatus/'. $sp->id_donhang )}}">Xác nhận</a>
                    <a onclick="return confirm('Xóa thật chứ ?');" href="{{ url('admin/xoadonhang/'. $sp->id_donhang .'/'. $sp->id_khachhang )}}" class="btn btn-sm btn-outline-danger">Xóa</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{-- <div class="d-flex justify-content-center">{!!  $dssp->links() !!}</div> --}}
@endsection
