@php
    use Illuminate\Support\Str;
@endphp
@extends('frontend.main')
@section('title', 'Trang Chủ')
@section('content')
    <!-- Slider Start -->
    @include('frontend.blocs.slider')
    @include('frontend.templates.notify')
    <!-- Slider End -->
    @include('frontend.blocs.searchBar')
    <!-- Featured Product -->
    @include('frontend.blocs.featuredProduct')
    <!-- Featured Product End -->
    <!-- Promotion 1 products Start -->
    @include('frontend.blocs.promotionCampaign')
    <!-- Promotion End -->
    <!-- New Products -->
    @include('frontend.blocs.newProduct')
    <!-- End -->
    <!-- Galery Image-->
    @include('frontend.blocs.featured_brand')
    <!-- End -->
    <!-- Promotion many products -->
    @include('frontend.blocs.promotion')
     <!-- End-->
    <!-- Client's comments Start -->
    @include('frontend.blocs.clientComment')
    <!-- End -->
@endsection