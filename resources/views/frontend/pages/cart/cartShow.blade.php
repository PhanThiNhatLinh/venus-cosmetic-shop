@extends('frontend.main')
@section('title', 'Trang Danh Mục Chi Tiết')
@section('content')
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
                                            <input id="form1" min="0" name="quantity" value="{{$product->qty}}" type="number"
                                                class="form-control form-control-sm" />
                                            <a href="{{route('cart.down',['id'=>$product->rowId])}}" class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h5 class="mb-0">{{number_format($product->price,0,'','.')}}</h5>
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
                                <h4>Tổng {{Cart::count()}} Sản Phẩm : <span style="color: blue">{{Cart::subtotal()}} (VND)</span></h4> 
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <div class="card">
                            <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg">Tiến Hành Đặt Hàng</button>
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