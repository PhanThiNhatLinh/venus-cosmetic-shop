<div class="container-fluid my-5 py-5 px-0">
    <div class="row justify-content-center m-0">
        <div class="col-lg-5">
            <h1 class="section-title position-relative text-center mb-5">Những Thương Hiệu Nổi Bật Hàng Đầu</h1>
        </div>
    </div>
    <div class="row m-0 portfolio-container">
        @foreach ($brandFeatured as $item)
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img style="width:100px; height:250px" class="img-fluid w-100" src="{{asset('/admin/images/brand/'.$item['thumb'])}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/admin/images/brand/'.$item['thumb'])}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <a style="font-size: 20px;" href="{{route('brand.frontend_index')}}">Xem Thêm Thương Hiệu <i class="fa fa-fast-forward" aria-hidden="true"></i> </a>
</div>