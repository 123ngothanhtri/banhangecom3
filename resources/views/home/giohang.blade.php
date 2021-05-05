@extends('home.layout')
@section('content')
<div class="container">
<div style="min-height:60vh">
    <a href="{{ url('/') }}" class="btn btn-info m-2">Tiếp tục mua hàng <i class="fas fa-angle-double-right"></i></a>
    @if (session('msg_not'))
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{session('msg_not')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <table class="table table-hover ">
        @foreach (Cart::content() as $row)
            <tr>
                <td><img src="{{ asset('images/' . ($row->options->has('photo') ? $row->options->photo : '')) }}"
                        height="50" width="auto"></td>
                <td>{{ $row->name }}</td>
                <td>
                    Số lượng
                    <div>
                        <a class="badge badge-light" href="{{ url('giamsoluong/'. $row->rowId )}}"><i class="fas fa-minus"></i></a>
                        {{ $row->qty }}
                        <a class="badge badge-light" href="{{ url('tangsoluong/'. $row->rowId )}}"><i class="fas fa-plus"></i></a>
                    </div>
                </td>
                <td>${{ number_format($row->total) }}</td>
                <td><a class="text-danger" href="{{ route('xoa', $row->rowId) }}"><i class="fas fa-times"></i></a></td>
            </tr>
        @endforeach
        
    </table>
    <h5 class="text-danger text-right">Tổng tiền: ${{ number_format(Cart::total()) }}</h5>
    <p class=" text-right"><a class="btn btn-info"  href="{{ url('/dathang')}}">Thủ tục thanh toán</a></p>
</div>
</div>
@endsection
