<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div style="display:inline-block" class="col-sm-12">
                <div class="col-md-3">
                    <select name="select_price" class="form-control" data-field="level">
                        <option value="all" selected="selected">Lọc Theo Giá</option>
                        @php
                            $price_fields = ["250000"=> "Từ 0-250.000", "500000"=> "Từ 250.000-500.000", "1000000"=> "Từ 500.000-1.000.000", "high"=> "Trên 1 Triệu"];
                        @endphp
                        @foreach($price_fields as $k=> $value)
                            @if($params['price_field'] == $k)
                                <option selected value="{{$k}}">{{$value}}</option>
                            @else
                                <option value="{{$k}}">{{$value}}</option>
                            @endif    
                        @endforeach
                    </select>
                    {{-- <input type="hidden" name="price_field" value="{{$params['price_field']}}"> --}}
                </div>
            </div>
        </div>
    </div>
</div>