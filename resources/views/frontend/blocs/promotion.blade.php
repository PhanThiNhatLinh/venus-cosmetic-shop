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
                        $name = Str::of($product['name'])->limit(40);
                        $promo = number_format($product['price'] - (($product['discount'] * $product['price'])/100),0,'','.');
                        $price = number_format($product['price'],0,'','.');

                    @endphp
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/admin/images/product/'.$product['thumb'])}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h5 class="font-weight-bold mt-5 mb-3 pt-5">{{$name}}</h5>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>{{$price}}</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">{{$promo}}</h4>
                                </div>
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>