@php
    $button = sprintf('<a href="%s" class="btn btn-success"><i class="fa %s"></i> %s</a>',
                        route($controllerName.'.index'), 'fa-arrow-left','Quay về');
    if($type == 'add'){
        $header_title = 'Trang Thêm Mới';
    }elseif($type == 'edit') {
        $header_title = 'Trang Chỉnh Sửa Thông Tin';
    }elseif ($type == 'index') {
        $header_title = 'Quản Lý '. ucfirst($controllerName);
        $button = sprintf('<a href="%s" class="btn btn-success"><i class="fa %s"></i> %s</a>',
                        route($controllerName.'.form_add'), 'fa-plus-circle','Thêm Mới');
    }else{
        $header_title = 'Quản Lý '. ucfirst($controllerName);
        $button = "";
    }
@endphp
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>{{$header_title}}</h3>
    </div>
    <div class="zvn-add-new pull-right">
        {!! $button !!}
    </div>
</div>
