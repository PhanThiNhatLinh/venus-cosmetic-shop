@extends('frontend.main')
@section('title', 'Trang Danh Mục Chi Tiết')
@section('content')
<div class="container-fluid p-0 mb-5 pb-5">
  <img style="height: 700px" class="w-100" src="{{asset('admin/images/blog/blog_bia.jpg')}}" alt="">
</div>
    <div class="content_container">
      <div class="container">
          <div class="row">
            <h1 class="section-title position-relative text-center mb-5">Blog - Chia Sẻ Mẹo Làm Đẹp</h1>
              <!-- Main Content -->
              <div class="col-lg-12">
                  <div class="main_content">
                      <div class="technology">
                          <div class="technology_content">
                            @foreach($items as $blog)
                            @php
                              $link = route('blog.detail',['blog_id' => $blog['id'],'blog_name' => Str::slug($blog['name'])]);
                            @endphp
                              <div class="post_item post_h_large">
                                  <div class="row">
                                      <div style="margin-bottom: 30px" class="col-lg-5">
                                          <div class="post_image"><img src="{{asset('admin/images/blog/'.$blog['thumb'])}}" alt="images/article/e7YyFZJCc8.jpeg" width="300px" height="200px"></div>
                                      </div>
                                      <div class="col-lg-7">
                                          <div class="post_content">
                                              <h4 class="post_title"><a href="{{$link}}">{{$blog['name']}}</a></h4>
                                              <div class="post_text">
                                                  <p>{{$blog['description']}}
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            @endforeach  
                            <div class="row justify-content-center">{{ $items->links('pagination::bootstrap-4');  }}</div>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection