@php
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Mã Đơn Hàng</th>
                <th class="column-title">Tên Khách Hàng</th>
                <th class="column-title">Sản Phẩm</th>
                <th class="column-title">Ngày Đặt Hàng</th>
                <th class="column-title">Trạng Thái</th>
                <th class="column-title">Ngày Cập Nhật</th>
                <th class="column-title">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @if(count($items)>0)
                    @foreach($items as $k=>$item)
                        @php
                            $index = $k+1;
                            $id = $item['id'];
                            $client_name = $item->user->name;
                            $products = $item->product;
                            $created_at = date(Config::get('linh_config.date.long_time'), strtotime($item['created_at']));
                            $updated_at = date(Config::get('linh_config.date.long_time'), strtotime($item['updated_at']));
                        @endphp
                            <tr class="even pointer">
                            <td width="5%">{{$index}}</td>
                            <td width="5%">{{$id}}</td>
                            <td width="10%">{{$client_name}}</td>
                            <td width="35%">
                                <div>
                                    @foreach ($products as $product)
                                       <div><i style="color:green" class="fa fa-check" aria-hidden="true"></i> {{$product['name']}}.</div>
                                       <strong>Số Lượng: {{$product->pivot->quantity}}</strong>
                                       <br>
                                    @endforeach
                                </div>
                            </td>
                            <td width="15%">{{$created_at}}</td>
                            <td width="15%">
                                <select data-url="{{route($controllerName.'.status',['status'=>'new_status','id'=>$id])}}" name="status" class="form-control">
                                    <option>Tùy Chọn</option>
                                    @foreach($params['status_for_order_controller'] as $status)
                                        @if($status == $item['status'])
                                            <option selected value="{{$status}}">{{$params['status_order_templates'][$status]['name']}}</option>
                                        @else
                                            <option value="{{$status}}">{{$params['status_order_templates'][$status]['name']}}</option>
                                        @endif    
                                    @endforeach
                                </select>
                            </td>
                            <td width="15%">{{$updated_at}}</td>
                            <td width="15%" class="last">
                                <div class="zvn-box-btn-filter">
                                    <a href="{{route($controllerName.'.delete',['id'=>$id])}}" type="button" class="btn btn-icon btn-danger btn-delete"
                                    data-toggle="tooltip" data-placement="top"
                                    data-original-title="Xóa">
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