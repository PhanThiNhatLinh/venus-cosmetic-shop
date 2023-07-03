<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliderItems as $k=>$item)
            @if($k==0)
            <div class="carousel-item active">
            @else
                <div class="carousel-item">
            @endif        
                <img style="height: 800px" class="w-100" src="{{asset('/admin/images/slider/'.$item['thumb'])}}" alt="{{$item['name']}}">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        {{-- <h1 style="color:blue" class="text-uppercase mb-md-5">{{$item['name']}}</h1> --}}
                        <h5 style="color:chartreuse; font-weight:200" class="display-3 text-uppercase mb-md-4">{{$item['name']}}</h5>
                        <p class="text-white">{{$item['description']}}</p>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Chi Tiết Tại Đây</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n1"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n1"></span>
            </div>
        </a>
    </div>
</div>