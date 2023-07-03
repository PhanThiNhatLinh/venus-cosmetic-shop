@php
$price = number_format($price_shock['price'],0,'','.');
$promo = number_format($price_shock['price'] - (($price_shock['discount'] * $price_shock['price'])/100),0,'','.');
@endphp
<div class="container-fluid my-5 py-5 px-0">
    <div style="background:#FF00FF" class="row m-0">
        <div class="col-md-6 px-0" style="min-height: 500px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100" src="{{asset('/admin/images/product/'.$price_shock['thumb'])}}" style="object-fit: cover;">
                <button type="button" class="btn-play" data-toggle="modal"
                    data-src="https://www.youtube.com/embed/52LjStjDij0" data-target="#videoModal">
                    <span></span>
                </button>
                
            </div>
        </div>
        <div class="col-md-6 py-5 py-md-0 px-0">
            <div class="h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                    style="width: 100px; height: 100px;">
                    <h3 class="font-weight-bold text-danger mb-0">Giảm {{$price_shock['discount']}}%</h3>
                </div>
                <h4><del>{{$price}}</del></h4>
                <h4 style="color:yellow; font-size:40px">{{$promo}}</h4>
                <h3 class="font-weight-bold text-white mt-3 mb-4">Sản Phẩm Giá Sốc Mỗi Tuần</h3>
                <p class="text-white mb-4">{{$price_shock['name']}}</p>
                <a href="" class="btn btn-secondary py-3 px-5 mt-2">Mua Hàng</a>
                <a href="/san-pham/chi-tiet/{{$price_shock['id']}}.html" class="btn btn-primary py-3 px-5 mt-2">Xem Chi Tiết</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>        
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>