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
                <th class="column-title">Ảnh Đại Diện</th>
                <th class="column-title">Trạng Thái</th>
                <th class="column-title">Vai Trò</th>
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
                            $email = $item['email'];
                            $thumb = $item['thumb'];
                            $created_at = date(Config::get('linh_config.date.long_time'), strtotime($item['created_at']));
                            $updated_at = date(Config::get('linh_config.date.long_time'), strtotime($item['updated_at']));
                            //status button
                            $status = (in_array($item['status'], $params['status_for_controller'])) ? $item['status'] : 'default';
                        @endphp
                            <tr class="even pointer">
                            <td width="1%">{{$index}}</td>
                            <td width="1%">{{$id}}</td>
                            <td width="40%">
                                <p><strong>Tên: </strong>{{$name}}</p>
                                <p><strong>Email: </strong>{{$email}}</p>
                                <p><strong>Số điện thoại: </strong></p>
                                <p><strong>Ngày sinh: </strong></p>
                                <p><strong>Địa chỉ: </strong></p>
                            </td>
                            <td width="10%">
                                <img width="50px" height="50px" src="{{asset('admin/images/'.$controllerName.'/'.$thumb)}}" alt="{{$name}}">
                            </td>
                            
                            <td width="15%">
                                <a href="{{route($controllerName.'.status',['id'=>$id, 'status'=> $status])}}" type="button" class="{{$params['status_templates'][$status]['class']}}">{{$params['status_templates'][$status]['name']}}</a>
                            </td>
                            <td width="15%">
                                <select data-url="{{route($controllerName.'.level',['level'=>'new_value','id'=>$item['id']])}}" name="level" class="form-control">
                                    <option>Tùy chọn</option>
                                    @foreach($params['level_for_controller'] as $level)
                                        @if($item['level'] == $level)
                                        <option selected value="{{$level}}" >{{$params['level_templates'][$level]['name']}}</option>
                                        @else
                                            <option value="{{$level}}" >{{$params['level_templates'][$level]['name']}}</option>
                                        @endif
                                    @endforeach  
                                </select>
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