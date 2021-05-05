@extends('home.layout')
@section('content')
<div class="container" style="height: 500px">
<div class="row">
    <div class="col-md-7">
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
                        <a class="badge badge-light" href="{{ url('giamsoluong/'. $row->rowId) }}"><i class="fas fa-minus"></i></a>
                        {{ $row->qty }}
                        <a class="badge badge-light" href="{{ url('tangsoluong/'. $row->rowId) }}"><i class="fas fa-plus"></i></a>
                    </div>
                </td>
                <td>${{ number_format($row->total) }}</td>
                <td><a class="text-danger" href="{{ route('xoa', $row->rowId) }}"><i class="fas fa-times"></i></a></td>
            </tr>
        @endforeach
    </table>
    <p>Địa chỉ giao hàng: {{ $user=Auth::guard('web')->user()->diachi }}</p>
    <h5 class="text-danger">Tổng tiền cần thanh toán: ${{ number_format(Cart::total()) }}</h5>
</div>
<div class="col-md-5">
    <h5 class="m-3 font-weight-boid">Hình thức thanh toán</h5>
    

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#menu1">Thanh toán qua Paypal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu2">Thanh toán khi nhận hàng</a>
        </li>
    </ul>
    <br>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="menu1">
            
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                
                <img class="img-thumbnail" src="https://newsroom.mastercard.com/wp-content/uploads/2016/09/paypal-logo.png" alt="">

                <input type="hidden" name="business" value="sb-ug9tt6055170@business.example.com">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_name" value="HoaDonMuaHang">
                <input type="hidden" name="amount" value="{{ Cart::total() }}">
                <input type="hidden" name="currency_code" value="USD">
                {{-- <input type="hidden" name="return" value="http://127.0.0.1:8000/paypal_thanhcong"> --}}
                <input type="hidden" name="return" value="http://127.0.0.1:8000/paypal_thanhtoan">
                
                <input class="btn btn-danger m-2" type="submit" value="Thanh toán Paypal">
            </form>
        </div>

        <div class="tab-pane container fade" id="menu2">
            <div class="border">
            <p class="text-center"><img style="height: 200px" src="https://etimg.etb2bimg.com/photo/55492753.cms" alt=""></p>
            </div>
            {{-- <form action="/xulydonhang" method="post">@csrf
                <input class="form-control" type="text" placeholder="Họ tên" name="ipname" required>
                @error('ipname')<code>{{ $message }}</code>@enderror<br>
                <input class="form-control" type="number" placeholder="Số điện thoại" name="ipsdt" required>
                @error('ipsdt')<code>{{ $message }}</code>@enderror<br />
                <input class="form-control" type="email" placeholder="Email" name="ipemail">
                @error('ipemail')<code>{{ $message }}</code>@enderror<br>
                <textarea style="height: 100px" class="form-control" type="text" placeholder="Địa chỉ giao hàng" name="ipdiachi" required></textarea>
                @error('ipdiachi')<code>{{ $message }}</code>@enderror<br />
                <input onclick="return confirm('Đặt hàng thật chứ ?');" class="btn btn-danger m-2" type="submit" value="Đặt hàng">
            </form> --}}
            <a class="btn btn-danger m-2" href="{{ url('/xulydonhang')}}" onclick="return confirm('Đặt hàng thật chứ ?');">Đặt hàng</a>

        </div>
      </div>




</div>
</div>
</div>
@endsection
