@extends('admin.main')
@section('title','Quản Lý Quyền')
@section('content')
<div class="right_col" role="main">
    @include('admin.templates.header_title',['type' =>'add'])
    @include('admin.templates.notify')
    @include('admin.templates.errors')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Thông Tin Thêm Quyền Mới</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" placeholder="Tên từ 5-200 kí tự"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Slug <span style="color: red">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name="permission_area" class="form-control" data-field="level">
                                    <option value="" selected="selected">Mời Chọn Phạm Vi Phân Quyền</option>
                                        @foreach($params['modules'] as $level)
                                            <option value="{{$level}}">{{$params['modules_templates'][$level]['name']}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name="permission_name" class="form-control" data-field="level">
                                    <option value="" selected="selected">Mời Chọn Quyền</option>
                                        @foreach($params['permission_templates'] as $k=> $permission)
                                                <option  value="{{$k}}">{{$permission['name']}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="slug" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô Tả <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="description" placeholder="Tên từ 5-200 kí tự"
                                       class="form-control col-md-7 col-xs-12">
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