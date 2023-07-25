@extends('frontend.main')
@section('title', 'Trang Danh Mục Chi Tiết')
@section('content')
@include('frontend.templates.success')
<div class="container-fluid p-0 mb-5 pb-5">
   <img style="height: 700px" class="w-100" src="{{asset('/frontend/img/gio_hang.jpg')}}" alt="giỏ hàng">
</div>
<div class="container-fluid py-5">
   <div class="container py-5">
    @if(Cart::count()>0)
      <div class="row justify-content-center">
         <div class="col-lg-7">
            <h1 class="section-title position-relative text-left mb-5">Giỏ Hàng Chi Tiết</h1>
         </div>
      </div>
      <div class="row">
         <section class="h-100" style="background-color: #F195B2;">
            <div class="h-100 py-5">
               <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-11">
                        {{-- @php
                            dd(Cart::content());
                        @endphp --}}
                        @foreach(Cart::content() as $product)
                        @php
                            $link = route('product.detail',['product_id' => $product->id,'product_name' => Str::slug($product->name)]);
                        @endphp
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                src="{{asset('/admin/images/product/'.$product->options->thumb)}}"
                                                class="img-fluid rounded-3" alt="">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <a href="{{$link}}"><h1 style="font-size: 15px;" class="lead fw-normal mb-2">{{$product->name}}</h1></a>
                                        </div>
                                        <div class="col-md-1 col-lg-3 col-xl-2 d-flex">
                                            <a href="{{route('cart.up',['id'=>$product->rowId])}}" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                            </a>
                                            <input style="width:70px" id="{{$product->rowId}}" min="0" name="quantity" value="{{$product->qty}}" type="number"
                                                class="qty_cart form-control form-control-sm"/>
                                            <a href="{{route('cart.down',['id'=>$product->rowId])}}" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h5 value = {{$product->price}} class="price mb-0">{{number_format($product->price,0,'',',')}}</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{route('cart.remove',['id'=>$product->rowId])}}" class="text-info"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-5">
                            <p>Xóa Giỏ Hàng <a href="{{route('cart.destroy')}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a></p>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body p-4 d-flex flex-row">
                                <div class="form-outline flex-fill">
                                <h4 id="subtotal">Tổng {{Cart::count()}} Sản Phẩm : <span id="total_money" style="color: blue">{{number_format(Cart::subtotal(),0,'',',')}} (VND)</span></h4> 
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="card">
                            <div class="card-body">
                                @if(Auth::check())
                                    @if(Cart::count()>0)
                                    <a href="{{route('order.index')}}" type="button" class="btn btn-warning btn-block btn-lg">Tiến Hành Đặt Hàng</a>
                                    @else  
                                        <p>Chưa có sản phẩm để đặt hàng. Quay lại<a href="/trang-chu">mua hàng</a></p>
                                    @endif
                                @else
                                    <p>Đăng nhập để tiến hành đặt hàng <a href="/login">Login</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
      </div>
    @else  
    <div class="col-lg-7">
        <h1 class="section-title position-relative text-left mb-5">Chưa có sản phẩm nào trong giỏ hàng!</h1>
    </div>
    @endif 
   </div>
</div>
@endsection