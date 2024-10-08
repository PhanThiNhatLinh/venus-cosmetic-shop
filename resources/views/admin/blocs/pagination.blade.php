<?php
$totalItems = $items->total();
$totalPages = $items->lastPage();
$totalItemsPerPage = $items->perPage();
?>
<div class="x_content">
    <div class="row">
        <div class="col-md-4">
            <p class="m-b-0">Tổng số phần tử trên trang: <b>{{$totalItems}}</b></p>
            <p class="m-b-0">Tổng số phần tử trên mỗi trang: <b>{{$totalItemsPerPage}}</b></p>
            <p class="m-b-0">Tổng số trang: <b>{{$totalPages}}</b></p>            
        </div>
        <div class="col-md-8">
            <nav aria-label="Page navigation example">
               {!! $items->appends(request()->input())->links('pagination.pagination_backend') !!}
            </nav>
        </div>
    </div>
</div>