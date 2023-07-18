@extends('admin.main')
@section('title','Quản Lý Phan Quyen')
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" value="{{$item['name']}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Slug
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name="permission_area" class="form-control" data-field="level">
                                    <option value="" >Mời Chọn Phạm Vi Phân Quyền</option>
                                        @foreach($params['modules'] as $level)
                                            @if(stripos($item['slug'], $level) !== false)
                                                <option selected="selected" value="{{$level}}">{{$params['modules_templates'][$level]['name']}}</option>
                                            @else
                                                <option value="{{$level}}">{{$params['modules_templates'][$level]['name']}}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name="permission_name" class="form-control" data-field="level">
                                    <option value="" selected="selected">Mời Chọn Quyền</option>
                                        @foreach($params['permission_templates'] as $k=> $permission)
                                            @if(stripos($item['slug'], $k) !== false)
                                                <option selected value="{{$k}}">{{$permission['name']}}</option>
                                            @else    
                                                <option  value="{{$k}}">{{$permission['name']}}</option>
                                            @endif    
                                        @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="slug" value="{{$item['slug']}}" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô Tả
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="description" value="{{$item['description']}}"
                                       class="form-control col-md-7 col-xs-12">
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