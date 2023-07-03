@php
// print_r($params);    
@endphp
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
                @if(count($items)>0)
                    @foreach($items as $k=>$item)
                        @php
                            $index = $k+1;
                            $id = $item['id'];
                            $name = $item['name'];
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
                            <td width="40%">
                                <p><strong>Tên Quốc Gia: </strong>{{$name}}</p>
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
                @else
                    @include('admin.templates.list_empty')
                @endif
            </tbody>
        </table>
    </div>
</div>