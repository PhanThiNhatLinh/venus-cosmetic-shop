@extends('admin.main')
@section('title','Quản Lý Slider')
@section('content')
<div class="right_col" role="main">
    @php
        print_r($item['thumb']);
    @endphp
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
                    <form method="POST" action="{{route($controllerName.'.save',['id'=> $item['id']])}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên Xuất Xứ <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="{{$item['name']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng Thái <span style="color: red">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển Thị <span style="color: red">*</span></label> 
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