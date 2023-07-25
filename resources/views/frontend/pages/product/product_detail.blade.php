@extends('frontend.main')
@section('title', 'Trang Sản Phẩm Chi Tiết')
@section('content')
@php
  $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');
  $price = number_format($product['price'],0,'','.');
  $exp = date(Config::get('linh_config.date.short_time'), strtotime($product['expiry_date']));
  $thumbs = json_decode($product['thumb'],true);
  $class_active ="active";
  $rating = $product->rating->pluck('rating')->toArray();
  if(!empty($rating)){
    $rating_count = array_sum($rating);
    $rating_average = round($rating_count/count($rating),1);
  }else{
    $rating_average = 0;
  }
  $comments = $product->comment;
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
                <div class="rate">
                  <div class="vote">
                    @for($i = 1; $i<= 5; $i++)
                      @if($i<=$rating_average)
                      <div class="star_{{$i}} ratings_stars ratings_over"><input value="{{$i}}" type="hidden"></div>
                        @else
                        <div class="star_{{$i}} ratings_stars"><input value="{{$i}}" type="hidden"></div>
                      @endif
                    @endfor  
                      <span class="rate-np">{{$rating_average}}</span>
                  </div> 
              </div>
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
                    @if ($product['stock']>0)
                      <div style="display: display-block" class="row">
                          <h5 class="text-muted mb-3">Số Lượng:<input style="width:100px" class="number_cart" type="number" value="" min="0" max={{$product['stock']}} /></h5>                            
                      </div>
                      <button style="margin-bottom: 2px" href="#"  id="{{$product['id']}}" class="btn btn-secondary py-3 px-5 mt-2 add-to-cart"><i style="color: white" id="fly" class="fas fa-cart-plus fa-lg"></i> Mua Hàng</button>
                    @endif
                    @if(Auth::check())
                      <input type="hidden" class="user_id" id="{{Auth::user()->id}}">
                      <input type="hidden" class="user_name" value="{{Auth::user()->name}}">
                      <input type="hidden" class="user_image" value="{{Auth::user()->thumb}}">
                    @endif
                  </div>
            </div>
        </div>
    </div>
    @include('frontend.templates.success')
    <div class="container py-5">
      <div class="card">  
        <div class="row">
          <div class="col-12">
              <div class="comment-box ml-2">
                  <h4>Add a comment</h4>
                  <div class="rate">
                    <div class="vote">
                        <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                        <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                        <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                        <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                        <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                        <span class="rate-np">0/5</span>
                    </div> 
                </div>
                <form method="GET" action="#">
                  <div class="comment-area">
                    <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea>
                  </div>
                  <div class="comment-btns mt-2">
                      <div style="text-align:right" class="row">
                          <div class="col-12">
                              <div class="pull-right">
                              <button type="submit" class="btn btn-secondary send btn-sm">Gửi<i class="fa fa-long-arrow-right ml-1"></i></button>      
                              </div>
                          </div>
                      </div>
                  </div>
                </form>
                  
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-left mb-7">
            Bình Luận Của Khách Hàng
          </h3>
          <div class="row">
            <div class="content_area col-md-12">
              @foreach($comments as $comment)
              <div style="margin-bottom:30px" class="media">
                  <img width="50px" height="50px" class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="{{asset('admin/images/user/'.$comment->user->thumb)}}" />
                  <div class="media-body">
                    <div class="row">
                      <div class="col-9 d-flex">
                      <h5 class="col-5">{{$comment->user->name}}</h5>
                      <span class="col-4" style="margin-left:80px"><i class="fa fa-clock" aria-hidden="true"></i> {{$comment['created_at']}}</span>
                      </div>
                      <div class="col-3">
                        {{-- @php
                          print_r(Auth::user()->id);
                        @endphp --}}
                        @if(Auth::check())
                          @if(Auth::user()->id == $comment->user->id)
                            <div class="pull-right reply">
                              <a id="{{$comment['id']}}" class="delete-comment" href="#"><span><i class="fa fa-times"></i> Xóa Bình Luận</span></a>
                            </div>
                          @endif
                        @endif  
                      </div>
                      <p style="margin-left:12px" >{!!$comment['comment']!!}</p>
                    </div>		
                   
                  {{-- <div class="media mt-4">
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
                  </div> --}}
                </div>
              </div>
              @endforeach 
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div> 
</div>
@include('frontend.blocs.newProduct')
@endsection