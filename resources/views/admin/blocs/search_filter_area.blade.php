@php
    if(!empty($status_counts)){
        array_unshift($status_counts, 
        ["count" => array_sum(array_column($status_counts,'count')), "status"=>"all"]);
        $class_active = "btn btn-danger";
    }
    
    $search_field = (!empty($params['search_field']))? $params['search_field_templates'][$params['search_field']]['name'] : 'Tìm kiếm tất cả';
    $link_search = (!empty($params['search_value']))? '&search_field='.$params['search_field'].'&search_value='.$params['search_value'] : '';
    $display_field_url = (!empty($params['filter_display']))? '&display_field='.$params['filter_display']: '';
    if(empty($display_field_url)){
        $display_field_url ="";
    }
    $filter_level_url = (!empty($params['filter_level']))? '&filter_level='.$params['filter_level']: '';
    if(empty($filter_level_url)){
        $filter_level_url ="";
    }
    
    $filter_status_order = (!empty($params['filter_status_order']))? '&filter_status_order='.$params['filter_status_order']: '';
    // print_r($filter_status_order);
    if(empty($filter_status_order)){
        $filter_status_order ="";
    }
@endphp


<div class="x_content">
<div class="row">
    <div class="col-md-6">
        @if(!empty($status_counts))
            @foreach($status_counts as $status)
            @if (!in_array($status['status'],$params['status_for_controller']) && $status['status'] !== "all" )
                @php
                    $status['status'] = 'default';
                @endphp
            @endif    
                @if ($params['filter_status'] == $status['status']) 
                    <a href="?filter_status={{$status['status']}}{{$link_search}}{{$display_field_url}}{{$filter_level_url}}" type="button" class="{{$class_active}}"> {{$params['status_templates'][$status['status']]['name']}} <span class="badge bg-white"> {{$status['count']}}</span></a>
                @else
                    <a href="?filter_status={{$status['status']}}{{$link_search}}{{$display_field_url}}{{$filter_level_url}}" type="button" class="btn btn-primary"> {{$params['status_templates'][$status['status']]['name']}} <span class="badge bg-white"> {{$status['count']}}</span></a>
                @endif
            @endforeach
        @endif    
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
                    {{$search_field}}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    @foreach($params['search_field_for_controller'] as $search_field)
                        <li><a href="#" class="select-field" data-field="{{$search_field}}">{{$params['search_field_templates'][$search_field]['name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <input type="text" class="form-control" name="search_value" value="{{$params['search_value']}}">
            <span class="input-group-btn">
        <button id="btn-clear" type="button" class="btn btn-success"
                style="margin-right: 0px">Xóa tìm kiếm</button>
        <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
        </span>
            <input type="hidden" name="search_field" value="{{$params['search_field']}}">
        </div>
    </div>
    @if (!empty($params['display_for_controller']))
        <div class="col-md-3">
            <select name="select_filter" class="form-control" data-field="level">
                <option value="all" selected="selected">Chọn Trạng Thái Hiển Thị</option>
                    @foreach($params['display_for_controller'] as $display)
                        @if ($params['filter_display'] == $display)
                            <option selected value="{{$display}}">{{$params['display_templates'][$display]['name']}}</option>
                        @else
                            <option value="{{$display}}">{{$params['display_templates'][$display]['name']}}</option>                    @endif
                    @endforeach
            </select>
            <input type="hidden" name="display_field" value="{{$params['filter_display']}}">
        </div>
    @endif
    @if (!empty($params['level_for_controller']))
        <div class="col-md-3">
            <select name="select_level" class="form-control" data-field="level">
                <option value="all" selected="selected">Chọn Vai trò</option>
                    @foreach($params['level_for_controller'] as $level)
                        @if ($params['filter_level'] == $level)
                            <option selected value="{{$level}}">{{$params['level_templates'][$level]['name']}}</option>
                        @else
                            <option value="{{$level}}">{{$params['level_templates'][$level]['name']}}</option>                    
                        @endif
                    @endforeach
            </select>
            <input type="hidden" name="level_field" value="{{$params['filter_level']}}">
        </div>
    @endif
    @if (!empty($params['modules_field']))
        <div class="col-md-3">
            <select name="select_permission" class="form-control" data-field="level">
                <option value="all" selected="selected"> Chọn Phạm Vi Phân Quyền</option>
                    @foreach($params['modules'] as $level)
                        @if ($params['modules_field'] == $level)
                            <option selected value="{{$level}}">{{$params['modules_templates'][$level]['name']}}</option>
                        @else
                            <option value="{{$level}}">{{$params['modules_templates'][$level]['name']}}</option>                    
                        @endif
                    @endforeach
                    
            </select>
            <input type="hidden" name="modules_field" value="{{$params['modules_field']}}">
        </div>
    @endif
    @if (!empty($params['status_for_order_controller']))
        <div class="col-md-3">
            <select name="order_status" class="form-control">
                <option value="all" selected="selected">Chọn Trạng Thái Đơn Hàng</option>
                    @foreach($params['status_for_order_controller'] as $status)
                        @if ($params['filter_status_order'] == $status)
                            <option selected value="{{$status}}">{{$params['status_order_templates'][$status]['name']}}</option>
                        @else
                            <option value="{{$status}}">{{$params['status_order_templates'][$status]['name']}}</option>                    
                        @endif
                    @endforeach
            </select>
            <input type="hidden" name="order_status" value="{{$params['filter_status_order']}}">
        </div>
    @endif
</div>
</div>