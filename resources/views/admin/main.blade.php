<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.layouts.nav_left')
        <!-- top navigation -->
        @include('admin.layouts.top_nav')
        <!-- /top navigation -->
        <!-- page content -->
        @yield('content')
        <!-- /page content -->
        <!-- footer -->
        @include('admin.layouts.footer')
        <!-- /footer -->
    </div>
</div>
@include('admin.layouts.script')
</body>
</html>