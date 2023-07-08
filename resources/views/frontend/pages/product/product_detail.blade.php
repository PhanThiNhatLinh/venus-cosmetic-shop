@extends('frontend.main')
@section('title', 'Trang Sản Phẩm Chi Tiết')
@section('content')
@php
  $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');
  $price = number_format($product['price'],0,'','.');
  $exp = date(Config::get('linh_config.date.short_time'), strtotime($product['expiry_date']));
  $thumbs = json_decode($product['thumb'],true);
  $class_active ="active";
@endphp

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h1 class="section-title position-relative text-center mb-5">{{$product['name']}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6" style="min-height: 400px;">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      @foreach ($thumbs as $k=> $thumb)
                        @if($k==0)
                         <div class="carousel-item {{$class_active}}">
                        @else
                          <div class="carousel-item">
                        @endif    
                          <img src="{{asset('/admin/images/product/'.$thumb)}}" alt="{{$product['name']}}" width="550" height="700">
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
            </div>
            <div class="col-lg-6">
                <!--/product-information-->
                <h6 class="text-muted mb-3"a><div class="rating"> 
                  <input type="radio" checked name="rating" value="5" id="5"><label for="5">☆</label>
                  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                  
                </div></h6>
                <h4>Thông Tin Sản Phẩm:</h4> 
                <div class="product-information">
                    {{-- <h1 class="font-weight-bold mb-3"></h1> --}}
                    <h6><strong>Mã Sản Phẩm:</strong> {{$product['code']}}</h6>
                    <div class="row">
                        @if($product['discount']>0)
                          <h4 class="col-3"style="color:mediumblue">{{$promo}}</h4>
                          <h4 class="col-6" style="color:black"><del>{{$price}}</del></h4>
                        @else
                          <h4 class="col-3"style="color:black">{{$price}}</h4>
                        @endif
                    </div>
                    <p class="description"> 
                        <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Mô Tả: </strong>{!!$product['description']!!}</h6>
                        <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Thương Hiệu: </strong>{{$product->brand->name}}</h6>
                        <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Xuất Xứ: </strong>{{$product->country->name}}</h6>
                        <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Hạn Sử Dụng: </strong>{{$exp}}</h6>
                        @if ($product['stock']>0)
                          <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong style="color:blue">Còn Hàng</strong></h6>
                        @else
                          <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong style="color: red">Hết Hàng</strong></h6>
                        @endif  
                    </p>
                    <div style="display: display-block" class="row">
                        <h5 class="text-muted mb-3">Số Lượng:<input type="number" value="" /></h5>                            
                    </div>
                    <button style="margin-bottom: 2px" href="#"  id="{{$product['id']}}" class="btn btn-secondary py-3 px-5 mt-2 add-to-cart"><i style="color: white" id="fly" class="fas fa-cart-plus fa-lg"></i> Mua Hàng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
      <div class="card">  
        <div class="row">
          <div class="col-12">
              <div class="comment-box ml-2">
                  <h4>Add a comment</h4>
                  <div class="rating"> 
                      <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                      <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                      <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                      <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                      <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                  </div>
                  <div class="comment-area">
                    <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea>
                  </div>
                  <div class="comment-btns mt-2">
                      <div style="text-align:right" class="row">
                          <div class="col-12">
                              <div class="pull-right">
                              <button class="btn btn-secondary send btn-sm">Gửi<i class="fa fa-long-arrow-right ml-1"></i></button>      
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-left mb-7">
            Bình Luận Của Khách Hàng
          </h3>
          <div class="row">
            <div class="col-md-12">
              <div class="media">
                <img width="50px" height="50px" class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="https://i.imgur.com/stD0Q19.jpg" />
                <div class="media-body">
                  <div class="row">
                    <div class="col-8 d-flex">
                    <h5>Maria Smantha</h5>
                    <span>- 2 hours ago</span>
                    </div>
                    <div class="col-4">
                    <div class="pull-right reply">
                  <a href="#"><span><i class="fa fa-reply"></i> Phản Hồi</span></a>
                    </div>
                    </div>
                  </div>		
                  It is a long established fact that a reader will be distracted by the readable content of a page.
                  <div class="media mt-4">
                      <a class="pr-3" href="#"><img width="50px" height="50px" class="rounded-circle" alt="Bootstrap Media Another Preview" src="https://i.imgur.com/xELPaag.jpg" /></a>
                    <div class="media-body">
                      <div class="row">
                    <div class="col-12 d-flex">
                    <h5>Simona Disa</h5>
                    <span>- 3 hours ago</span>
                    </div>                      
                  </div>
                      letters, as opposed to using 'Content here, content here', making it look like readable English.
                    </div>
                  </div>
                  <div class="media mt-3">
                      <a class="pr-3" href="#"><img width="50px" height="50px" class="rounded-circle" alt="Bootstrap Media Another Preview" src="https://i.imgur.com/nAcoHRf.jpg" /></a>
                    <div class="media-body">
                      <div class="row">
                    <div class="col-12 d-flex">
                    <h5>John Smith</h5>
                    <span>- 4 hours ago</span>
                    </div>
                  </div>
                      the majority have suffered alteration in some form, by injected humour, or randomised words.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div> 
</div>
@include('frontend.blocs.newProduct')
@endsection