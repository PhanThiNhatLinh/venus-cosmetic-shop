<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/trang-chu" class="site_title"><i class="fa fa-paw"></i> <span>Venus Cosmetic</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('admin/images/'.$controllerName.'/'.Auth::user()->thumb)}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Xin Chào!</span>
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="color: white">Danh Sách Các Mục Quản Lý</h3>
                <ul class="nav side-menu">
                    <li><a href="/trang-chu"><i class="fa fa-home"></i>Về Lại Trang Chủ</a></li>
                    <li><a href="/admin/user/profile"><i class="fa fa-user" aria-hidden="true"></i> Thông Tin Tài Khoản</a></li>
                    <li><a href="/admin/order"><i class="fa fa-list-ul"></i>Thông Tin Đơn Hàng</a></li>
                    @canany(['user.view'])
                        <li class="dropdown">
                            <a type="button" data-toggle="dropdown"><i class="fa fa-users"></i>Quản Lý Người dùng</a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/user">Danh Sách Người Dùng</a></li>
                                <li><a href="/admin/permission">Phân Quyền</a></li>
                                <li><a href="/admin/role">Vai Trò</a></li>
                            </ul>
                        </li>
                        
                    @endcanany
                    @canany(['product.view','country.view','brand.view','category.view','blog.view','slider.view'])
                        <li><a href="/admin/product"><i class="fa fa-product-hunt"></i>Sản Phẩm</a></li>
                        <li><a href="/admin/country"><i class="fa fa-globe"></i> Xuất Xứ Sản Phẩm</a></li>
                        <li><a href="/admin/brand"><i class="fa fa-tasks"></i> Thương Hiệu Sản Phẩm</a></li>
                        <li><a href="/admin/category"><i class="fa fa fa-building-o"></i> Danh Mục Sản Phẩm</a></li>
                        <li><a href="/admin/blog"><i class="fa fa-newspaper-o"></i> Blog</a></li>
                        <li><a href="/admin/slider"><i class="fa fa-sliders"></i> Silders</a></li>
                    @endcanany
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>