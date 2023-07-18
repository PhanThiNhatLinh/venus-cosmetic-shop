@php
$m
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">ID</th>
                <th class="column-title">Tên Quyền</th>
                <th class="column-title">Phạm Vi Phân Quyền</th>
                <th class="column-title">Slug</th>
                <th class="column-title">Mô Tả</th>
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
                            $slug = $item['slug'];
                            $module = ucfirst(explode('.',$slug)[0]);
                            $description = $item['description'];
                            
                        @endphp
                            <tr class="even pointer">
                            <td width="10%">{{$index}}</td>
                            <td width="10%">{{$id}}</td>
                            <td width="15%">{{$name}}</td>
                            <td width="15%">Bảng {{$module}}</td>
                            <td width="20%">{{$slug}}</td>
                            <td width="15%">{{$description}}</td>
                            <td width="15%" class="last">
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