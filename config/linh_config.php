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
        ],
        'level' => [
            'user' =>['super_admin','admin','user'],
        ],
    ],

    'template' => [
        'status' => [
            'active' =>['name'=>'Kích Hoạt','class'=>'btn btn-round btn-success'],
            'inactive' =>['name'=>'Không Kích Hoạt','class'=>'btn btn-round btn-danger'],
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
        'level' => [
            'super_admin' =>['name'=>'Quản Lý Cao Cấp'],
            'admin' =>['name'=>'Quản Trị Viên'],
            'user' =>['name'=>'Người Dùng'],
            'default' =>['name'=>'Chưa Xác Định'],
        ],
    ],
];    