@extends('admin.main')
@section('title','Quản Lý Người Dùng')
@section('content')
<div class="right_col" role="main">
    @include('admin.templates.header_title',['type' =>'add'])
    @include('admin.templates.notify')
    @include('admin.templates.errors')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Thông Tin Người Dùng</h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật Khẩu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" value=""
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật Khẩu Xác Minh
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password_confirmation" value=""
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Điện Thoại
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="phone" name="phone"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày Sinh
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="birthday"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa Chỉ
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="address"
                                       class="form-control col-md-7 col-xs-12">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Vai Trò</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="level" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($params['level_for_controller'] as $level)
                                        <option value="{{$level}}" >{{$params['level_templates'][$level]['name']}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh Đại Diện
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="thumb" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="id" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" value="add" name="task" class="form-control col-md-7 col-xs-12">
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