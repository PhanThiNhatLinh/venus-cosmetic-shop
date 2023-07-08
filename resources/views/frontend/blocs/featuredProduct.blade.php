<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="section-title position-relative mb-5">Sản phẩm nổi bật</h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel product-carousel">
                    @foreach($productFeatured as $product)
                        @php
                            $name = Str::of($product['name'])->limit(40);
                            $thumbs = json_decode($product['thumb'],true);
                            $price = number_format($product['price'],0,'','.');
                            $xhtml = '';
                            if ($product['discount']>0) {
                                $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');
                                $xhtml = sprintf('<del style="font-size: 15px; margin-bottom: -10px">%s</del>
                                                 <h4 style="color:mediumblue; margin-top: -10px">%s</h4>'
                                                ,$price,$promo);
                            }else{
                                $xhtml = sprintf('<del style="color:#F195B2; font-size: 15px; margin-bottom: -10px">00000</del>
                                                 <h4 style="color:white; margin-top: -10px">%s</h4>'
                                                ,$price);
                            }
                        @endphp
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 130px;">
                                {!!$xhtml!!}
                            </div>
                            @foreach ($thumbs as $thumb)
                               @if(!empty($thumb))
                                    <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 255px; height: 255px;">
                                        <img class="rounded-circle w-100 h-100" src="{{asset('/admin/images/product/'.$thumb)}}" style="object-fit: cover;">
                                    </div>
                                    @break;
                                @endif
                            @endforeach
                            <h5 class="font-weight-bold mb-4">{{$name}}</h5>
                            <button style="margin-bottom: 2px" href="#"  id="{{$product['id']}}" class="btn btn-sm btn-secondary add-to-cart"><i style="color: white" id="fly" class="fas fa-cart-plus fa-lg"></i> Mua Hàng</button>
                            <a href="/san-pham/chi-tiet/{{$product['id']}}.html" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>