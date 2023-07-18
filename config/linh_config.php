<?php
return [

    'date' => [
        'short_time' => 'd/m/Y',
        'long_time' => 'H:m:s d/m/Y',
    ],

    'config' => [
        'status' => [
            'slider' =>['active','inactive'],
            'blog' =>['active','inactive'],
            'product' =>['active','inactive'],
            'brand' =>['active','inactive'],
            'category' =>['active','inactive'],
            'country' =>['active','inactive'],
            'user' =>['active','inactive'],
            'order' =>['ordered','packed','delivering','done','cancel'],
        ],
        'display' => [
            'slider' =>['no','yes'],
            'blog' =>['no','yes'],
            'product' =>['no','yes'],
            'brand' =>['no','yes'],
            'category' =>['no','yes'],
            'country' =>['no','yes'],
        ],
        'search' => [
            'slider' =>['all','name','link','id'],
            'blog' =>['all','name','id'],
            'product' =>['all','name','id','code'],
            'brand' =>['all','name'],
            'category' =>['all','name'],
            'country' =>['all','name'],
            'user' =>['all','name'],
            'permission' =>['all','name'],
            'role' =>['all','name'],
            'order' =>['all','id'],
        ],

        'module' => [
            'permission' =>['brand','blog','user','category','country','product','permission','role','order','slider'],
        ],

    ],

    'template' => [
        'status' => [
            'active' =>['name'=>'Kích Hoạt','class'=>'btn btn-round btn-success'],
            'inactive' =>['name'=>'Không Kích Hoạt','class'=>'btn btn-round btn-danger'],
            'ordered' =>['name'=>'Đã Đặt Hàng','class'=>'btn btn-round btn-success'],
            'packed' =>['name'=>'Đã Đóng Gói','class'=>'btn btn-round btn-success'],
            'delivering' =>['name'=>'Đang Giao Hàng','class'=>'btn btn-round btn-success'],
            'done' =>['name'=>'Đã Giao Hàng','class'=>'btn btn-round btn-success'],
            'cancel' =>['name'=>'Đã Hủy Đơn','class'=>'btn btn-round btn-success'],
            'all' =>['name'=>'Tất Cả','class'=>'btn btn-round btn-success'],
            'default' =>['name'=>'Chưa Xác Định','class'=>'btn btn-round btn-info'],
        ],
        'display' => [
            'yes' =>['name'=>'Hiển Thị','class'=>'btn btn-round btn-success'],
            'no' =>['name'=>'Ẩn','class'=>'btn btn-round btn-danger'],
            'default' =>['name'=>'Chưa Xác Định','class'=>'btn btn-round btn-info'],
        ],
        'search' => [
            'all' =>['name'=>'Tìm Kiếm Tất Cả'],
            'name' =>['name'=>'Tìm Bằng Tên'],
            'link' =>['name'=>'Tìm Bằng Link'],
            'id' =>['name'=>'Tìm Bằng ID'],
            'code' =>['name'=>'Tìm Bằng Mã Sản Phẩm'],
            'default' =>['name'=>'Chưa Xác Định'],
        ],
        'featured' => [
            'yes' =>['name'=>'Nổi Bật'],
            'no' =>['name'=>'Không'],
        ],

        'module' => [
            'brand' =>['name'=>'Quản Lý Thương Hiệu'],
            'blog' =>['name'=>'Quản Lý Các Bài Blog'],
            'user' =>['name'=>'Quản Lý Người Dùng'],
            'category' =>['name'=>'Quản Lý Danh Mục'],
            'country' =>['name'=>'Quản Lý Xuất Xứ'],
            'product' =>['name'=>'Quản Lý Sản Phẩm'],
            'slider' =>['name'=>'Quản Lý Slider'],
            'permission' =>['name'=>'Quản Lý Phân Quyền'],
            'role' =>['name'=>'Quản Lý Vai Trò'],
            'order' =>['name'=>'Quản Lý Đơn Hàng'],
            'default' =>['name'=>'Chưa Xác Định'],
        ],

        'permission' => [
            'add' =>['name'=>'Thêm'],
            'edit' =>['name'=>'Sửa'],
            'delete' =>['name'=>'Xóa'],
            'view' =>['name'=>'Xem nội Dung'],
            'save' =>['name'=>'Lưu'],
            'change_status' =>['name'=>'Thay đổi trạng thái hoạt động'],
            'change_display' =>['name'=>'Thay đổi trạng thái hiển thị'],
            'show_profile' =>['name'=>'Xem profile của mỗi người dùng'],
            'change_role' =>['name'=>'Thay đổi vai trò của mỗi người dùng'],
            'default' =>['name'=>'Chưa Xác Định'],
        ],

    ],
];    