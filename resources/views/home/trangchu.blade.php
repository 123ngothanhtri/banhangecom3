@extends('home.layout')
@section('content')

    <div class="d-flex justify-content-between p-2">
        <div>
            @if (session('msg'))
                <div class="mb-0 btn alert-success"><i class="far fa-check-circle"></i> {{ session('msg') }}</div>
            @endif
        </div>
        <a class="btn btn-info" href="{{ url('giohang') }}"><i class="fas fa-shopping-cart"></i> Xem giỏ hàng</a>
    </div>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <?php $i = 0; ?>
            @foreach ($slider as $s)
                <li data-target="#demo" data-slide-to="{{ $i }}" @if ($i == 0) class="activel" @endif></li>
                <?php $i++; ?>
            @endforeach
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php $i = 0; ?>
            @foreach ($slider as $s)
                <div class="carousel-item 
                                @if ($i==0) active @endif ">
                                <?php $i++; ?>
                                  <img src=" {{ asset('slider/' . $s['image_slider']) }}" width="100%">
                </div>
            @endforeach
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="container">
        <div class="bg-white text-center"><img height="20px" src="el.jpg"></div>


        {{-- <div class="d-flex justify-content-between"> --}}
        <form class="form-inline" action="{{ url('/loc')}}" method="post">@csrf
            <select class="form-control" name="iploaisp">
                <option value="0">Tất cả</option>
                @foreach ($lsp as $i)
                    <option value="{{ $i->id_loaisanpham }}">{{ $i->name_loaisanpham }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-info">Lọc</button>
        </form>

        {{-- <form class="form-inline" action="/timkiem" method="post">@csrf
        <input class="form-control" type="text" placeholder="Nhập từ khóa" name="tk" required>
        <button type="submit" class="btn btn-info">Tìm kiếm</button>
    </form>
</div> --}}
        <p class="alert-info rounded text-center p-1">Máy quạt cao cấp</p>


        <div class="owl-carousel">
            @foreach ($sp as $s)
                @if ($s->amount_sanpham > 0)
                    <div class="card shadow mb-3 item">
                        <img style="width:100%;height:150px;object-fit:contain"
                            src="{{ asset('images/' . $s['image_sanpham']) }}">
                        <div class="card-body">
                            <p>{{ $s->name_sanpham }}</p>
                            <p class="card-text text-danger">${{ number_format($s->price_sanpham) }}</p>
                            <a href="{{ url('chitietsanpham/' . $s->id_sanpham . '/' . $s->id_loaisanpham) }}"
                                class="btn btn-sm btn-block btn-outline-info">Chi tiết</a>
                            <a href="{{ url('themvaogiohang/' . $s->id_sanpham) }}"
                                class="btn btn-sm btn-block btn-info">Thêm vào giỏ hàng</a>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <p class="alert-info rounded text-center p-1">Tất cả sản phẩm</p>
        <div class="d-flex flex-wrap">
            @foreach ($sp as $s)
                @if ($s->amount_sanpham > 0)
                    <div class="card  p-1 m-1">
                        <img style="width:250px;max-height:250px;object-fit:cover "
                            src="{{ asset('images/' . $s['image_sanpham']) }}">
                        <div class="card-body">
                            <h6 class="card-title">{{ $s->name_sanpham }}</h6>
                            <b class="text-danger">${{ number_format($s->price_sanpham) }}</b>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('themvaogiohang/' . $s->id_sanpham) }}" class="btn btn-sm btn-info ">
                                    Thêm vào giỏ hàng
                                </a>
                                <a href="{{ url('chitietsanpham/' . $s->id_sanpham . '/' . $s->id_loaisanpham) }}"
                                    class="btn btn-sm btn-outline-info">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    
    
    {{-- <div class="d-flex justify-content-center">{!! $data->links() !!}</div> --}}
@endsection
@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            autoplaySpeed:500,
            responsive: {
                0: {
                    items: 1
                },
                300: {
                    items: 2
                },
                700: {
                    items: 3
                },
                900: {
                    items: 4
                },
                1100: {
                    items: 5
                }
            }
        })
    </script>
@endsection