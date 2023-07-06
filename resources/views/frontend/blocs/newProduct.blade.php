
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
                                        <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/admin/images/product/'.$thumb)}}" style="object-fit: cover;">
                                    </div>
                                    @break;
                                @endif
                            @endforeach
                            <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                                <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">{{$name}}</h5>
                                {!!$xhtml!!}
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="/san-pham/chi-tiet/{{$product['id']}}.html" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                    @endforeach
                    
                    {{-- <div class="service-item">
                        <div class="service-img mx-auto">
                            <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/frontend/img/service-1.jpg')}}" style="object-fit: cover;">
                        </div>
                        <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                            <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">Quality Maintain</h5>
                            
                            <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                        </div>
                    </div> --}}
                    {{-- <div class="service-item">
                        <div class="service-img mx-auto">
                            <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/frontend/img/service-1.jpg')}}" style="object-fit: cover;">
                        </div>
                        <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                            <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">Quality Maintain</h5>
                            <h4>350,000</h4>
                            <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                        </div>
                    </div>
                    <div class="service-item">
                        <div class="service-img mx-auto">
                            <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/frontend/img/service-1.jpg')}}" style="object-fit: cover;">
                        </div>
                        <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                            <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">Quality Maintain</h5>
                            <h4>150,000</h4>
                            <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>