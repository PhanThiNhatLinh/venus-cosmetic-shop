
<div class="container-fluid bg-primary py-3 d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">Câu Hỏi Thường Gặp</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Hỗ Trợ</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="">
                        <i class="fas fa-cart-plus"> Giỏ Hàng</i>
                    </a>
                    @if(Auth::check())
                    <a class="text-white px-3" href="">
                        <i class="fas fa-user-alt">{{Auth::user()->name}}</i>
                    </a>
                    <a class="text-white px-3" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-key"> Đăng Xuất</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a class="text-white px-3" href="/login">
                        <i class="fas fa-key"> Đăng Nhập</i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>