<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Venus Cosmetic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/frontend/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">Câu Hỏi Thường Gặp</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Hỗ Trợ</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fas fa-user-alt"> Nguyễn Văn Linh</i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fas fa-cart-plus"> Giỏ Hàng</i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fas fa-key"> Login</i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fas fa-key"> Logout</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">V</span>ENUS</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Tóc Đẹp</a>
                        <a href="about.html" class="nav-item nav-link">Da Mặt</a>
                        <a href="product.html" class="nav-item nav-link">Trang Điểm</a>
                    </div>
                    <a href="index.html" class="text-center navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">V</span>ENUS</h1>
                        <span class="font-weight-bold">The Best Cosmetic Shop</span>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="service.html" class="nav-item nav-link">Răng Miệng</a>
                        <a href="gallery.html" class="nav-item nav-link">Cơ Thể</a>
                        <a href="contact.html" class="nav-item nav-link">Nail Xinh</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('/frontend/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Traditional & Delicious</h4>
                            <h1 class="display-3 text-white mb-md-4">Traditional Ice Cream Since 1950</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('/frontend/img/carousel-2.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Traditional & Delicious</h4>
                            <h1 class="display-3 text-white mb-md-4">Made From Our Own Organic Milk</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
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
    <!-- Carousel End -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row">
                <div style="margin-left:30%; margin-top:-70px; display:inline-block" class="col-sm-6">
                    <form method="POST" action="/product/search">
                        @csrf
                        <div class="search_box pull-left">
                            <input style="width:80%" name="search_data" type="text" value="" placeholder="Tìm Kiếm Sản Phẩm"/>
                            <button type="submit" class="btn btn-default btn-primary btn-search"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="section-title position-relative text-center mb-5">Traditional & Delicious Ice Cream Since 1950</h1>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-4 py-5">
                    <h4 class="font-weight-bold mb-3">About Us</h4>
                    <h5 class="text-muted mb-3">Eos kasd eos dolor vero vero, lorem stet diam rebum. Ipsum amet sed vero dolor sea</h5>
                    <p>Takimata sed vero vero no sit sed, justo clita duo no duo amet et, nonumy kasd sed dolor eos diam lorem eirmod. Amet sit amet amet no. Est nonumy sed labore eirmod sit magna. Erat at est justo sit ut. Labor diam sed ipsum et eirmod</p>
                    <a href="" class="btn btn-secondary mt-2">Learn More</a>
                </div> --}}
                <div class="col-lg-6" style="min-height: 400px;">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{asset('/frontend/img/about.jpg')}}" alt="Los Angeles" width="600" height="600">
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('/frontend/img/about.jpg')}}" alt="Chicago" width="600" height="600">
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('/frontend/img/about.jpg')}}" alt="New York" width="600" height="600">
                          </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                      </div>
                    {{-- <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="{{asset('/frontend/img/about.jpg')}}" style="object-fit: cover;">
                    </div> --}}
                </div>
                <div class="col-lg-6">
                    {{-- <h4 class="font-weight-bold mb-3">Our Features</h4>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</p>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Eos kasd eos dolor</h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Eos kasd eos dolor</h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Eos kasd eos dolor</h5>
                    <a href="" class="btn btn-primary mt-2">Learn More</a> --}}
                    <div class="product-information"><!--/product-information-->
                        <h1 class="font-weight-bold mb-3">Tên Sản Phẩm</h1>
                        <h6><strong>Web ID:</strong> 1089772</h6>
                        <img src="{{asset('/frontend/img/rating.png')}}" alt="" />
                        <div style="display: display-block" class="row">
                            <h4 class="col-3"style="color:mediumblue">120,000</h4>
                            <h4 class="col-6" style="color:black"><del>150,000</del></h4>
                        </div>
                        <p class="description"> 
                            <h4>Thông Tin Sản Phẩm:</h4> 
                            <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Mô Tả:</strong>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor</h6>
                            <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Thương Hiệu:</strong>LifeBoy</h6>
                            <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Xuất Xứ:</strong>Việt Nam</h6>
                            <h6 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i><strong>Hạn Sử Dụng:</strong>20/10/2024</h6>
                        </p>
                        <div style="display: display-block" class="row">
                            <h5 class="text-muted mb-3">Số Lượng:<input type="number" value="3" /></h5>                            
                        </div>
                        <a href="" class="btn btn-secondary py-3 px-5 mt-2">Thêm Vào Giỏ Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 100px;">
                                <del style="font-size: 15px; margin-bottom: -10px">100,000</del>
                                <h4 style="color:mediumblue; margin-top: -10px">99,000</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 200px; height: 200px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a style="margin-bottom: 2px" href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 100px;">
                                <del style="font-size: 15px; margin-bottom: -10px">100,000</del>
                                <h4 style="color:mediumblue; margin-top: -10px">99,000</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 200px; height: 200px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a style="margin-bottom: 2px" href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 100px;">
                                <h4 class="font-weight-bold text-white mb-0">99,000</h4>
                                <del style="font-size: 15px; margin-bottom: -10px; color:#F195B2">0</del>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 200px; height: 200px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a style="margin-bottom: 2px" href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 100px;">
                                <del style="font-size: 15px; margin-bottom: -10px">100,000</del>
                                <h4 style="color:mediumblue; margin-top: -10px">99,000</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 200px; height: 200px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a style="margin-bottom: 2px" href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                            <a href="" class="btn btn-sm btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="owl-carousel product-carousel">
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-2.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-3.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-4.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-5.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- About End -->
<!-- Promotion Start -->
    <div class="container-fluid my-5 py-5 px-0">
        <div style="background:#FF00FF" class="row m-0">
            <div class="col-md-6 px-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{asset('/frontend/img/promotion.jpg')}}" style="object-fit: cover;">
                    <button type="button" class="btn-play" data-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 py-5 py-md-0 px-0">
                <div class="h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                        style="width: 100px; height: 100px;">
                        <h3 class="font-weight-bold text-danger mb-0">Giảm 50%</h3>
                    </div>
                    <h4><del>240,000</del></h4>
                    <h4 style="color:yellow; font-size:40px">120,000</h4>
                    <h3 class="font-weight-bold text-white mt-3 mb-4">Sản Phẩm Giá Sốc Mỗi Tuần</h3>
                    <p class="text-white mb-4">Dầu Gội Dưỡng Tóc</p>
                    <a href="" class="btn btn-secondary py-3 px-5 mt-2">Mua Hàng</a>
                    <a href="" class="btn btn-primary py-3 px-5 mt-2">Xem Chi Tiết</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Promotion End -->

    <!-- Video Modal Start -->
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
    <!-- Video Modal End -->


    <!-- Services Start -->
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
                        <div class="service-item">
                            <div class="service-img mx-auto">
                                <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{asset('/frontend/img/service-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded p-4 pb-5" style="margin-top: -75px;">
                                <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">Quality Maintain</h5>
                                <h4>270,000</h4>
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
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>150,000</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">120,000</h4>
                                </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
    <div class="container-fluid my-5 py-5 px-0">
        <div class="row justify-content-center m-0">
            <div class="col-lg-5">
                <h1 class="section-title position-relative text-center mb-5">Đội Ngũ Tư Vấn Tận Tâm - Sản Phẩm Chất Lượng - Luôn Sẵn Sàng Phục Vụ Quý Khách</h1>
            </div>
        </div>
        <div class="row m-0 portfolio-container">
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-1.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-1.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-2.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-2.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-3.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-3.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-4.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-4.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-5.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-5.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-6.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-6.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Start -->
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
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>150,000</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">120,000</h4>
                                </div>
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-2.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>150,000</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">120,000</h4>
                                </div>
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-3.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>150,000</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">120,000</h4>
                                </div>
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-4.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <div class="row">
                                    <h4 class="col-6" style="color:black; text-align:right"><del>150,000</del></h4>
                                    <h4 class="col-6"style="color:mediumblue; text-align:left">120,000</h4>
                                </div>
                                <a href="" class="btn btn-sm btn-secondary">Mua Hàng</a>
                                <a href="" class="btn btn-sm btn-primary">Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid my-5 py-5 px-0">
        <div class="row justify-content-center m-0">
            <div class="col-lg-5">
                <h1 class="section-title position-relative text-center mb-5">Delicious Ice Cream Made From Our Very Own Organic Milk</h1>
            </div>
        </div>
        <div class="row m-0 portfolio-container">
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-1.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-1.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-2.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-2.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-3.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-3.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-4.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-4.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-5.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-5.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('/frontend/img/portfolio-6.jpg')}}" alt="">
                    <a class="portfolio-btn" href="{{asset('/frontend/img/portfolio-6.jpg')}}" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Portfolio End -->


    <!-- Products Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5">Best Prices We Offer For Ice Cream Lovers</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel product-carousel">
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-2.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-3.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-4.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                            <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                <h4 class="font-weight-bold text-white mb-0">$99</h4>
                            </div>
                            <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/product-5.jpg')}}" style="object-fit: cover;">
                            </div>
                            <h5 class="font-weight-bold mb-4">Vanilla Ice Cream</h5>
                            <a href="" class="btn btn-sm btn-secondary">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->


    <!-- Team Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5">Experienced & Most Famous Ice Cream Chefs</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel team-carousel">
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-1.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <h6 class="text-uppercase text-muted mb-4">Designation</h6>
                                <div class="d-flex justify-content-center pt-1">
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-2.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <h6 class="text-uppercase text-muted mb-4">Designation</h6>
                                <div class="d-flex justify-content-center pt-1">
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-3.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <h6 class="text-uppercase text-muted mb-4">Designation</h6>
                                <div class="d-flex justify-content-center pt-1">
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="team-img mx-auto">
                                <img class="rounded-circle w-100 h-100" src="{{asset('/frontend/img/team-4.jpg')}}" style="object-fit: cover;">
                            </div>
                            <div class="position-relative text-center bg-light rounded px-4 py-5" style="margin-top: -100px;">
                                <h3 class="font-weight-bold mt-5 mb-3 pt-5">Full Name</h3>
                                <h6 class="text-uppercase text-muted mb-4">Designation</h6>
                                <div class="d-flex justify-content-center pt-1">
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Khách Hàng Cảm Nhận Về <span class="text-secondary">V</span><span class="text-primary">ENUS</span></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</h4>
                            <img class="img-fluid mx-auto mb-3" src="{{asset('/frontend/img/testimonial-1.jpg')}}" alt="">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</h4>
                            <img class="img-fluid mx-auto mb-3" src="{{asset('/frontend/img/testimonial-2.jpg')}}" alt="">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</h4>
                            <img class="img-fluid mx-auto mb-3" src="{{asset('/frontend/img/testimonial-3.jpg')}}" alt="">
                            <h5 class="font-weight-bold m-0">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer bg-light py-5" style="margin-top: 90px;">
        <div class="container text-center py-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="index.html" class="navbar-brand m-0">
                        <h1 class="m-0 mt-n2 display-4 text-primary"><span class="text-secondary">V</span>ENUS</h1>
                    </a>
                </div>
                <div class="col-12 mb-4">
                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary btn-social" href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-12 mt-2 mb-4">
                    <div class="row">
                        <div class="col-sm-6 text-center text-sm-right border-right mb-3 mb-sm-0">
                            <h5 class="font-weight-bold mb-2">Get In Touch</h5>
                            <p class="mb-2">123 Street, New York, USA</p>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="col-sm-6 text-center text-sm-left">
                            <h5 class="font-weight-bold mb-2">Opening Hours</h5>
                            <p class="mb-2">Mon – Sat, 8AM – 5PM</p>
                            <p class="mb-0">Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="m-0">&copy; <a href="#">Domain</a>. All Rights Reserved. Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('/frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/frontend/js/main.js')}}"></script>
</body>

</html>