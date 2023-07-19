@extends('admin.main')
@section('title','Quản Lý Slider')
@section('content')
<div class="right_col" role="main">
    @include('admin.templates.notify')
    @include('admin.templates.errors')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thông Tin Người Dùng</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="POST" action="{{route($controllerName.'.save',['id'=> Auth::user()->id])}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" value="{{Auth::user()->name}}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="{{Auth::user()->email}}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số Điện Thoại (+84)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input title="Số điện thoại phải từ 10-11 số, bắt đầu bằng +84" type="phone" name="phone" value="{{Auth::user()->phone}}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày Sinh
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="birthday" value="{{Auth::user()->birthday}}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa Chỉ
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="address" value="{{Auth::user()->address}}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh Đại Diện
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="thumb" class="form-control col-md-7 col-xs-12">
                            <img width="50px" height="50px" src="{{asset('/admin/images/'.$controllerName.'/'.Auth::user()->thumb)}}" alt="avatar_user">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" value="{{Auth::user()->id}}" name="id" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" value="edit_info" name="task" class="form-control col-md-7 col-xs-12">
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>     
@endsection        