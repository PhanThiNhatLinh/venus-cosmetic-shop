<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
            <a href="/trang-chu" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-primary"><span class="text-secondary">V</span>ENUS</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                
                <div class="navbar-nav ml-auto py-0">
                    @for($i=0; $i<3; $i++)
                    @php
                        $link = route('category.detail',['category_id' => $categoryItems[$i]['id'],'category_name' => Str::slug($categoryItems[$i]['name'])]);
                    @endphp
                        <a href="{{$link}}" class="nav-item nav-link">{{$categoryItems[$i]['name']}}</a>
                    @endfor    
                </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="/bai-viet" class="nav-item nav-link">Blog</a>
                    </div>
                    <a href="/trang-chu" class="text-center navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">V</span>ENUS</h1>
                        <span class="font-weight-bold">The Best Cosmetic Shop</span>
                    </a>
                <div class="navbar-nav ml-auto py-0">
                    @for($i=3; $i<6; $i++)
                        @php
                            $link = route('category.detail',['category_id' => $categoryItems[$i]['id'],'category_name' => Str::slug($categoryItems[$i]['name'])]);
                        @endphp
                        <a href="{{$link}}" class="nav-item nav-link">{{$categoryItems[$i]['name']}}</a>
                    @endfor    
                </div>
            </div>
        </nav>
    </div>
</div>