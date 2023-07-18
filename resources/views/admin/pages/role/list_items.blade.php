@php
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">ID</th>
                <th class="column-title">Vai Trò</th>
                <th class="column-title">Quyền</th>
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
                            $description = $item['description'];
                            $permissions = $item->permission->pluck('name');
                        @endphp
                            <tr class="even pointer">
                            <td width="10%">{{$index}}</td>
                            <td width="10%">{{$id}}</td>
                            <td width="15%">{{$name}}</td>
                            <td width="15%">
                                <div class="wrapper">
                                    @foreach ($permissions as $permission)
                                       <div class="ty-compact-list"><i style="color:green" class="fa fa-check" aria-hidden="true"></i> {{$permission}}</div>
                                    @endforeach
                                    <a style="color: blue" class="show-more">Xem Toàn Bộ Quyền</a>
                                </div>
                            </td>
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