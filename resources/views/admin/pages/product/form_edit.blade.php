@extends('admin.main')
@section('title','Quản Lý Slider')
@section('content')
<div class="right_col" role="main">
    @include('admin.templates.header_title',['type' =>'edit'])
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
                    <form id="form_edit" method="POST" action="{{route($controllerName.'.save',['id'=> $item['id']])}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="{{$item['name']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô Tả
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" id="ckeditor" >{{$item['description']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="price" value="{{$item['price']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phần Trăm Khuyến Mãi <span style="color: red">(%)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="discount" value="{{$item['discount']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Lượng
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="stock" value="{{$item['stock']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã Sản Phẩm
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="code" value="{{$item['code']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hạn Sử Dụng
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="expiry_date" value="{{$item['expiry_date']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thương Hiệu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <select name="id_brand" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($brands as $brand)
                                        @if($brand['id'] == $item['id_brand'])
                                            <option selected value="{{$brand['id']}}">{{$brand['name']}}</option>
                                        @else
                                            <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                        @endif    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh Mục
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <select name="id_category" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($categories as $category)
                                        @if($category['id'] == $item['id_category'])
                                            <option selected value="{{$category['id']}}">{{$category['name']}}</option>
                                        @else
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endif    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sản Xuất Tại
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <select name="id_country" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($countries as $country)
                                        @if($country['id'] == $item['id_country'])
                                            <option selected value="{{$country['id']}}">{{$country['name']}}</option>
                                        @else
                                            <option value="{{$country['id']}}">{{$country['name']}}</option>
                                        @endif    
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
                                        @if($item['status'] == $status)
                                            <option selected value="{{$status}}" >{{$params['status_templates'][$status]['name']}}</option>
                                        @else
                                            <option value="{{$status}}" >{{$params['status_templates'][$status]['name']}}</option>
                                        @endif
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
                                        @if($item['featured'] == $key)
                                            <option selected value="{{$key}}">{{$value['name']}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value['name']}}</option>
                                        @endif    
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
                                        @if($item['display'] == $display)
                                        <option selected value="{{$display}}" >{{$params['display_templates'][$display]['name']}}</option>
                                        @else
                                            <option value="{{$display}}" >{{$params['display_templates'][$display]['name']}}</option>
                                        @endif
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sốc mỗi tuần
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="price_shock" class="form-control">
                                    <option>Tùy chọn</option>
                                    @if($item['price_shock'] == "yes")
                                        <option selected value="yes">Có</option>
                                        <option value="no">Không</option>
                                    @else
                                        <option value="yes">Có</option>
                                        <option selected value="no">Không</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div id='video' class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Video Link
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="video" value="{{$item['video']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh <span style="color: red; font-size:10px">(* Sản phẩm không quá 3 ảnh)</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="thumb[]" class="form-control col-md-7 col-xs-12" multiple>
                                @php
                                 $thumbs = json_decode($item['thumb'],true);
                                //  dd($thumbs);
                                @endphp
                                @foreach ($thumbs as $thumb)
                                    <img id={{$thumb}} width="50px" height="50px" src="{{asset('/admin/images/'.$controllerName.'/'.$thumb)}}" alt="{{$item['name']}}">
                                    <input class="delete_thumb" type="checkbox" name="image_delete[]" value="{{$thumb}}">
                                @endforeach
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" value="{{$item['id']}}" name="id" class="form-control col-md-7 col-xs-12">
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