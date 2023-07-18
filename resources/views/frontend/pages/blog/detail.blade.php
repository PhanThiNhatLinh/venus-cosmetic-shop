@extends('frontend.main')
@section('title', 'Trang Danh Mục Chi Tiết')
@section('content')
<div class="container-fluid p-0 mb-5 pb-5">
  <img style="height: 700px" class="w-100" src="{{asset('admin/images/blog/'.$item['thumb'])}}" alt="">
</div>
    <div class="content_container">
      <div class="container">
          <div class="row">
            <h1 class="section-title position-relative text-center mb-5">{{$item['name']}}</h1>
              <!-- Main Content -->
              <div class="col-lg-12">
                  <div class="main_content">
                        <div class="row">
                            <div class="post_content">
                                <div class="post_text">
                                    <p>{!!$item['content']!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
@endsection