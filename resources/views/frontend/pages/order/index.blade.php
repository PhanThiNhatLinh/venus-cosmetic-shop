@extends('frontend.main')
@section('title', 'Trang Đặt Hàng')
@section('content')
<div class="container-fluid py-5">
   <div class="container py-5">
      <div class="row justify-content-center">
         <div class="col-lg-7">
            <h1 class="section-title position-relative text-left mb-5">Tiến Hành Đặt Hàng</h1>
         </div>
      </div>
      <div class="x_panel">
        <div class="x_title">
            <h2>Thông Tin Đặt Hàng</h2>
        </div>
        <div class="x_content">
            <form method="POST" action="{{route('order.save')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input disabled type="text" name="name" value="{{Auth::user()->name}}"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input disabled type="email" name="email" value="{{Auth::user()->email}}"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Điện Thoại
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input disabled type="phone" name="phone" value="{{Auth::user()->phone}}"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày Sinh
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input disabled type="date" name="birthday" value="{{Auth::user()->birthday}}"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa Chỉ
                    </label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input disabled type="text" name="address" value="{{Auth::user()->address}}"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <p>Thay đổi thông tin đặt hàng <a href="{{route('user.profile')}}">ở đây</a></p>
                <div class="x_title">
                    <h2>Thông Tin Sản Phẩm</h2>
                </div>
                @foreach(Cart::content() as $product)
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="{{asset('/admin/images/product/'.$product->options->thumb)}}"
                                        class="img-fluid rounded-3" alt="">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <h1 style="font-size: 15px;" class="lead fw-normal mb-2">{{$product->name}}</h1>
                                </div>
                                <div class="col-md-1 col-lg-3 col-xl-2 d-flex">
                                    <a href="{{route('cart.up',['id'=>$product->rowId])}}" class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                    </a>
                                    <input id="form1" min="0" name="quantity[]" value="{{$product->qty}}" type="number"
                                        class="form-control form-control-sm" />
                                    <a href="{{route('cart.down',['id'=>$product->rowId])}}" class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                    </a>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <h5 class="mb-0">{{number_format($product->price,0,'','.')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="product_id[]" value="{{$product->id}}">
                @endforeach
                <div class="card mb-4">
                    <h5>Phí Vận Chuyển Tiêu Chuẩn: <span style="color: blue">35.000 (VND)</span></h5> 
                    <h5>Tổng {{Cart::count()}} Sản Phẩm : <span style="color: blue">{{number_format(Cart::subtotal()+35000,0,'','.')}} (VND)</span></h5> 
                </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control col-md-7 col-xs-12">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control col-md-7 col-xs-12">
                        @if(Auth::check())
                            @if(Cart::count()>0)
                                @if(empty(Auth::user()->address) && empty(Auth::user()->phone))
                                    <p>Thiếu địa chỉ giao hàng và số điện thoại. Chỉnh sửa <a href="{{route('user.profile')}}">ở đây </a>để đặt hàng.</p>
                                @elseif(empty(Auth::user()->address))
                                    <p>Thiếu địa chỉ giao hàng. Chỉnh sửa <a href="{{route('user.profile')}}">ở đây </a>để đặt hàng.</p>
                                @elseif(empty(Auth::user()->phone))
                                    <p>Thiếu số điện thoại. Chỉnh sửa <a href="{{route('user.profile')}}">ở đây </a>để đặt hàng.</p>
                                @else
                                    <button type="submit" class="btn btn-success">Đặt Hàng</button>
                                @endif    
                            @else  
                                    <p>Chưa có sản phẩm để đặt hàng. Quay lại<a href="/trang-chu"> mua hàng</a></p>
                            @endif
                        @else
                            <p>Đăng nhập để tiến hành đặt hàng <a href="/login">Login</a></p>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
</div>
@endsection