<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">ID</th>
                <th class="column-title">Thông tin</th>
                <th class="column-title">Trạng Thái</th>
                <th class="column-title">Hiển Thị</th>
                <th class="column-title">Tạo Mới</th>
                <th class="column-title">Chỉnh sửa</th>
                <th class="column-title">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $k=>$item)
                   @php
                    $index = $k+1;
                    $id = $item['id'];
                    $name = $item['name'];
                    $description = $item['description'];
                    $thumb = $item['thumb'];
                    $link = $item['link'];
                    $display = $item['display'];
                    $created_by = $item['created_by'];
                    $created_at = date(Config::get('linh_config.date.long_time'), strtotime($item['created_at']));
                    $modified_by = $item['modified_by'];
                    $updated_at = date(Config::get('linh_config.date.long_time'), strtotime($item['updated_at']));
                    //status button
                    $status = (in_array($item['status'], $params['status_for_controller'])) ? $item['status'] : 'default';
                    //display button
                    $display = (in_array($item['display'], $params['display_for_controller'])) ? $item['display'] : 'default';
                   @endphp
                    <tr class="even pointer">
                        <td width="1%">{{$index}}</td>
                        <td width="1%">{{$id}}</td>
                        <td width="20%">
                            <p><strong>Tên: </strong>{{$name}}</p>
                            <p><strong>Mô Tả: </strong>{{$description}}</p>
                            <p><strong>Link: </strong>{{$link}}</p>
                            <p><strong>Hình ảnh: </strong></p>
                            <img width="100%" height="200px" src="{{asset('admin/images/'.$controllerName.'/'.$thumb)}}" alt="{{$name}}">
                        </td>
                        <td width="10%">
                            <a href="{{route($controllerName.'.status',['id'=>$id, 'status'=> $status])}}" type="button" class="{{$params['status_templates'][$status]['class']}}">{{$params['status_templates'][$status]['name']}}</a>
                        </td>
                        <td width="10%">
                            <a href="{{route($controllerName.'.display',['id'=>$id, 'display'=> $display])}}" type="button" class="{{$params['display_templates'][$display]['class']}}">{{$params['display_templates'][$display]['name']}}</a>
                        </td>
                        <td width="10%">
                            <p><i class="fa fa-user"></i> {{$created_by}}</p>
                            <p><i class="fa fa-clock-o"></i> {{$created_at}}</p>
                        </td>
                        <td width="10%">
                            <p><i class="fa fa-user"></i> {{$modified_by}}</p>
                            <p><i class="fa fa-clock-o"></i> {{$updated_at}}</p>
                        </td>
                        <td class="last">
                            <div class="zvn-box-btn-filter"><a
                                    href="{{route($controllerName.'.form_edit',['id'=>$id])}}"
                                    type="button" class="btn btn-icon btn-success" data-toggle="tooltip"
                                    data-placement="top" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a><a href="{{route($controllerName.'.delete',['id'=>$id])}}"
                                type="button" class="btn btn-icon btn-danger btn-delete"
                                data-toggle="tooltip" data-placement="top"
                                data-original-title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            </div>
                        </td>
                    </tr>
                @endforeach    
            {{-- <tr class="odd pointer">
                <td class="">2</td>
                <td class="">1002</td>
                <td width="40%">
                    <p><strong>Tên</strong></p>
                    <p><strong>Mô Tả</strong></p>
                    <p><strong>Link</strong></p>
                    <p><strong>Hình ảnh</strong></p>
                </td>
                <td>active</td>
                <td>yes</td>
                <td>
                    <p><i class="fa fa-user"></i> admin</p>
                    <p><i class="fa fa-clock-o"></i> 10/12/2014</p>
                </td>
                <td>
                    <p><i class="fa fa-user"></i> hailan</p>
                    <p><i class="fa fa-clock-o"></i> 10/12/2014</p>
                </td>
                <td class="last">
                    <div class="zvn-box-btn-filter"><a
                            href="/form/1"
                            type="button" class="btn btn-icon btn-success" data-toggle="tooltip"
                            data-placement="top" data-original-title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a><a href="/delete/1"
                        type="button" class="btn btn-icon btn-danger btn-delete"
                        data-toggle="tooltip" data-placement="top"
                        data-original-title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                    </div>
                </td>
            </tr> --}}
            </tbody>
        </table>
    </div>
</div>