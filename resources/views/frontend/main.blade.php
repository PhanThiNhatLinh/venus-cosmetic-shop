<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.head')
    <body>
        <!-- Topbar Start -->
        @include('frontend.layouts.topNav')
        <!-- Topbar End -->
        <!-- Navbar Start -->
        @include('frontend.layouts.categoryNav')
        <!-- Navbar End -->
        @yield('content')
        <!-- Footer Start -->
        @include('frontend.layouts.footer')
        <!-- Footer End -->
        <!-- Back to Top -->
        @include('frontend.layouts.backToTopButton')
        <!-- JavaScript Libraries -->
        @include('frontend.layouts.script')
    </body>
</html>