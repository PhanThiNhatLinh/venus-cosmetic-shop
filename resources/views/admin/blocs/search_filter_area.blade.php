@php
    // array_unshift($status_counts, 
    // ["count" => array_sum(array_column($status_counts,'count')), "status"=>"all"]);
    $class_active = "btn btn-danger";
    $search_field = (!empty($params['search_field']))? $params['search_field_templates'][$params['search_field']]['name'] : 'Tìm kiếm tất cả';
    $search_field_url = (!empty($params['search_field']))? '&search_field='.$params['search_field'].'&search_value='.$params['search_value'] : '';
    $display_field_url = (!empty($params['filter_display']))? '&display_field='.$params['filter_display']: '';
@endphp


<div class="x_content">
<div class="row">
    <div class="col-md-6">
        {{-- @foreach($status_counts as $status)
            @if ($params['filter_status'] == $status['status']) 
                <a href="?filter_status={{$status['status'].$search_field_url.$display_field_url}}" type="button" class="{{$class_active}}"> {{$params['status_templates'][$status['status']]['name']}} <span class="badge bg-white"> {{$status['count']}}</span></a>
            @else
                <a href="?filter_status={{$status['status'].$search_field_url.$display_field_url}}"$link_search type="button" class="btn btn-primary"> {{$params['status_templates'][$status['status']]['name']}} <span class="badge bg-white"> {{$status['count']}}</span></a>
            @endif
        @endforeach --}}
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
    <div class="col-md-3">
        <select name="select_filter" class="form-control" data-field="level">
            <option value="all" selected="selected">Trạng Thái Hiển Thị</option>
                {{-- @foreach($params['display_for_controller'] as $display)
                    @if ($params['filter_display'] == $display)
                        <option selected value="{{$display}}">{{$params['display_templates'][$display]['name']}}</option>
                    @else
                        <option value="{{$display}}">{{$params['display_templates'][$display]['name']}}</option>                    @endif
                @endforeach --}}
        </select>
        {{-- <input type="hidden" name="display_field" value="{{$params['filter_display']}}"> --}}
    </div>
</div>
</div>