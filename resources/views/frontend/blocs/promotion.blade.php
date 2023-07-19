<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="section-title position-relative mb-5">Sản Phẩm Khuyến Mãi</h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel team-carousel">
                    @foreach($promoProducts as $product)
                    @php
                        $link = route('product.detail',['product_id' => $product['id'],'product_name' => Str::slug($product['name'])]);
                        $name = Str::of($product['name'])->limit(40);
                        $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');
                        $price = number_format($product['price'],0,'','.');
                        $thumbs = json_decode($product['thumb'],true);
                    @endphp
                        <div class="team-item">
                            @foreach ($thumbs as $thumb)
                               @if(!empty($thumb))
                                    <a href="{{$link}}">
                                        <div class="team-img mx-auto">
                                            <img class="rounded-circle w-100 h-100" src="{{asset('/admin/images/product/'.$thumb)}}" style="object-fit: cover;">
                                        </div>
                                    </a>    
                                    @break;
                                @endif
                            @endforeach    
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <a href="{{$link}}"><h5 class="font-weight-bold mt-5 mb-3 pt-5">{{$name}}</h5></a>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>{{$price}}</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">{{$promo}}</h4>
                                </div>
                                <button style="margin-bottom: 2px" href="#"  id="{{$product['id']}}" class="btn btn-sm btn-secondary add-to-cart"><i style="color: white" id="fly" class="fas fa-cart-plus fa-lg"></i> Mua Hàng</button>
                                <a href="{{$link}}" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>