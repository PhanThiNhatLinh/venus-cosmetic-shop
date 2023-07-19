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
                    <form id="form_add" method="POST" action="{{route($controllerName.'.save')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên <span style="color: red; font-size:10px">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Lượng <span style="color: red; font-size:10px">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="stock"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã Sản Phẩm <span style="color: red; font-size:10px">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="code"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô Tả <span style="color: red; font-size:10px">(Từ 5-2000 chữ)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" id="ckeditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hạn Sử Dụng <span style="color: red; font-size:10px">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="expiry_date"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản Xuất Tại <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thương Hiệu <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh Mục <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng Thái <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản Phẩm Nổi Bật <span style="color: red; font-size:10px">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển Thị <span style="color: red; font-size:10px">*</span> </label> 
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sốc mỗi tuần <span style="color: red; font-size:10px">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="price_shock" class="form-control">
                                    <option>Tùy chọn</option>
                                    <option value="yes">Có</option>
                                    <option value="no">Không</option>
                                </select>
                            </div>
                        </div>
                        <div id='video' class="form-group"> 
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Video Link 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="video"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh <span style="color: red; font-size:10px">(* Có Thể Tải Lên Từ 1-3 ảnh)</span>
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