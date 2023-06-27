<div class="container-fluid py-1">
    <div class="container py-1">
        <div class="row">
            <div style="margin-left:30%; margin-top:-70px; display:inline-block" class="col-sm-6">
                <form method="POST" action="/product/search">
                    @csrf
                    <div class="search_box pull-left">
                        <input style="width:80%" name="search_data" type="text" value="" placeholder="Tìm Kiếm Sản Phẩm"/>
                        <button type="submit" class="btn btn-default btn-primary btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>