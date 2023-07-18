@extends('admin.main')
@section('title','Đơn Hàng Của Bạn')
@section('content')
    <div class="right_col" role="main">
        @include('admin.templates.header_title',['type' => ''])
        @include('admin.templates.notify')
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Bộ Lọc'])
                </div>
            </div>
        </div>
        <!--box-lists-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Danh Sách'])
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Mã Đơn Hàng</th>
                                    <th class="column-title">Sản Phẩm</th>
                                    <th class="column-title">Ngày Đặt Hàng</th>
                                    <th class="column-title">Trạng Thái Đơn Hàng</th>
                                    <th class="column-title">Hủy Đơn</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($items)>0)
                                        @foreach($items as $k=>$item)
                                            @php
                                                $index = $k+1;
                                                $id = $item['id'];
                                                $client_name = $item->user->name;
                                                $status = $item['status'];
                                                $products = $item->product;
                                                $created_at = date(Config::get('linh_config.date.long_time'), strtotime($item['created_at']));
                                                $updated_at = date(Config::get('linh_config.date.long_time'), strtotime($item['updated_at']));
                                            @endphp
                                                <tr class="even pointer">
                                                <td width="5%">{{$index}}</td>
                                                <td width="5%">{{$id}}</td>
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
                                                    <p>{{$params['status_order_templates'][$status]['name']}}</p>
                                                </td>
                                                @if($status == "ordered")
                                                    <td>
                                                        <a id="order_cancel" class="btn btn-danger" type="button" href="{{route($controllerName.'.status',['status'=>'cancel','id'=>$id])}}">Hủy Đơn</a>
                                                    </td>
                                                @elseif($status == "cancel")
                                                    <td>Đơn Hàng Này Đã Bị Hủy!</td>
                                                @else
                                                    <td>Bạn Không Thể Hủy Đơn!</td>
                                                @endif    
                                            </tr>
                                        @endforeach
                                    @else
                                        @include('admin.templates.list_empty')
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end-box-lists-->
        <!--box-pagination-->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('admin.templates.x_title',['x_title' => 'Phân Trang'])
                    @include('admin.blocs.pagination')
                </div>
            </div>
        </div>
        <!--end-box-pagination-->
    </div>
@endsection