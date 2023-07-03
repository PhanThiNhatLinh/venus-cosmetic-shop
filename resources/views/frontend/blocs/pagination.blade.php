<?php
$totalItems = $productsInCategory->total();
$totalPages = $productsInCategory->lastPage();
?>
<div class="x_content">
    <div class="row">
        <div class="col-md-4">
            <p class="m-b-0">Tổng: <b>{{$totalItems}}</b> Sản Phẩm</p>
            <p class="m-b-0">Tổng số trang: <b>{{$totalPages}}</b></p>            
        </div>
        <div class="col-md-8">
            <nav aria-label="Page navigation example">
               {!! $productsInCategory->appends(request()->input())->links('pagination.pagination_frontend',['paginator'=> $productsInCategory]) !!}
            </nav>
        </div>
    </div>
</div>