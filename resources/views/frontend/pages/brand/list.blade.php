@extends('frontend.main')
@section('title', 'Trang Danh Mục Chi Tiết')
@section('content')
<div class="container-fluid p-0 mb-5 pb-5">
  <img style="height: 700px" class="w-100" src="{{asset('admin/images/brand/brand_bia.jpg')}}" alt="">
</div>
    <div class="content_container">
      <div class="container">
          <div class="row">
            <h1 class="section-title position-relative text-center mb-5">Danh Sách Thương Hiệu</h1>
              <!-- Main Content -->
              <div class="col-lg-12">
                  <div class="main_content">
                    <div class="row m-0 portfolio-container">
                      @foreach($items as $brand)
                      @php
                        $link = route('brand.detail',['brand_id' => $brand['id'],'brand_name' => Str::slug($brand['name'])]);
                      @endphp
                        <div style="margin-bottom: 20px" class="col-lg-3 col-md-6 p-0 portfolio-item">
                            <div class="position-relative overflow-hidden">
                                <img style="width:250px; height:250px" src="{{asset('admin/images/brand/'.$brand['thumb'])}}" alt="">
                                <a class="row justify-content-center" href="{{$link}}">{{$brand['name']}}</a>
                            </div>
                        </div>
                      @endforeach  
                        </div>
                            <div class="row justify-content-center">{{ $items->links('pagination::bootstrap-4');  }}</div>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection