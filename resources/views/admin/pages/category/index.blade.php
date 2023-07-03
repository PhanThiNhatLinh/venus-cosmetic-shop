@extends('admin.main')
@section('title','Quản Lý Slider')
@section('content')
    <div class="right_col" role="main">
        @include('admin.templates.header_title',['type' => 'index'])
        @include('admin.templates.notify')
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Bộ Lọc'])
                    @include('admin.blocs.search_filter_area')
                </div>
            </div>
        </div>
        
        <!--box-lists-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Danh Sách'])
                    @include('admin.pages.'.$controllerName.'.list_items')
                </div>
            </div>
        </div>
        <!--end-box-lists-->
        <!--box-pagination-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Phân Trang'])
                    @include('admin.blocs.pagination')
                </div>
            </div>
        </div>
        <!--end-box-pagination-->
    </div>
@endsection