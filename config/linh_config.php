<?php
return [

    'date' => [
        'short_time' => 'd/m/Y',
        'long_time' => 'H:m:s d/m/Y',
    ],

    'config' => [
        'status' => [
            'slider' =>['active','inactive'],
        ],
        'display' => [
            'slider' =>['no','yes'],
        ],
        'search' => [
            'slider' =>['all','name','link','id'],
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
            'no' =>['name'=>'Không Hiển Thị','class'=>'btn btn-round btn-danger'],
            'default' =>['name'=>'Chưa Xác Định','class'=>'btn btn-round btn-info'],
        ],
        'search' => [
            'all' =>['name'=>'Tìm Kiếm Tất Cả'],
            'name' =>['name'=>'Tìm Bằng Tên'],
            'link' =>['name'=>'Tìm Bằng Link'],
            'id' =>['name'=>'Tìm Bằng ID'],
            'default' =>['name'=>'Chưa Xác Định'],
        ]
    ],
];    