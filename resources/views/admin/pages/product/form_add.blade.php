@extends('admin.main')
@section('title','Quản Lý Slider')
@section('content')
<div class="right_col" role="main">
    @include('admin.templates.header_title',['type' =>'add'])
    @include('admin.templates.notify')
    @include('admin.templates.errors')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Thông Tin</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" action="{{route($controllerName.'.save')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="price"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phần Trăm Khuyến Mãi <span style="color: red">(%)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="discount"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Lượng
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="stock"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã Sản Phẩm
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="code"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô Tả
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" id="ckeditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hạn Sử Dụng
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="expiry_date"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản Xuất Tại
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="id_country"  class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country['id']}}">{{$country['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thương Hiệu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <select name="id_brand"  class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh Mục
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  name="id_category" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($categories as $category)
                                        <option  value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng Thái
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="status" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($params['status_for_controller'] as $status)
                                        <option value="{{$status}}" >{{$params['status_templates'][$status]['name']}}</option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản Phẩm Nổi Bật
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="featured" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($params['featured_templates'] as $key => $value)
                                        <option value="{{$key}}">{{$value['name']}}</option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển Thị</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="display" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($params['display_for_controller'] as $display)
                                        <option value="{{$display}}" >{{$params['display_templates'][$display]['name']}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh
                            </label>
                            {{-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="thumb" class="form-control col-md-7 col-xs-12">
                            </div> --}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="thumb[]" class="form-control col-md-7 col-xs-12" multiple>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="id" class="form-control col-md-7 col-xs-12">
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection