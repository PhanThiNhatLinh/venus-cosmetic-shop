
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="section-title position-relative mb-5">Sản Phẩm Mới</h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel service-carousel">
                    @foreach($latestProducts as $product)
                    @php
                        $link = route('product.detail',['product_id' => $product['id'],'product_name' => Str::slug($product['name'])]);
                        $name = Str::of($product['name'])->limit(40);
                        $thumbs = json_decode($product['thumb'],true);
                        $price = number_format($product['price'],0,'','.');
                        $xhtml = '';
                        if ($product['discount']>0) {
                            $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');;
                            $xhtml = sprintf('<div class="row">
                                                <h4 class="col-6" style="color:black; text-align:right"><del>%s</del></h4>
                                                <h4 class="col-6"style="color:mediumblue; text-align:left">%s</h4>
                                            </div>',$price,$promo);
                        }else{
                            $xhtml = sprintf('<h4>%s</h4>',$price);
                        }
                    @endphp
                        <div class="service-item">
                            @foreach ($thumbs as $thumb)
                                @if(!empty($thumb))
                                    <div class="service-img mx-auto">
                                        <a href="{{$link}}"><img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/admin/images/product/'.$thumb)}}" style="object-fit: cover;"></a>
                                    </div>
                                    @break;
                                @endif
                            @endforeach
                            <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                                <a href="{{$link}}"><h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">{{$name}}</h5></a>
                                {!!$xhtml!!}
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