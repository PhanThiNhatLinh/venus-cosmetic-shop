$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //fly to cart
    function flyToElement(flyer, flyingTo) {
        var $func = $(this);
        var divider = 3;
        var flyerClone = $(flyer).clone();
        $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
        $('body').append($(flyerClone));
        var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
        var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;
         
        $(flyerClone).animate({
            opacity: 0.4,
            left: gotoX,
            top: gotoY,
            width: $(flyer).width()/divider,
            height: $(flyer).height()/divider
        }, 700,
        function () {
            $(flyingTo).fadeOut('fast', function () {
                $(flyingTo).fadeIn('fast', function () {
                    $(flyerClone).fadeOut('fast', function () {
                        $(flyerClone).remove();
                    });
                });
            });
        });
    }
  
    //add to card
    $('button.add-to-cart').click(function(){
        let id_product = $(this).attr('id');
        let qty_cart_total = parseInt($(this).closest("body").find("a.total_cart").text());
        let qty_add_to_cart = parseInt($("input.number_cart").val());
        if(qty_add_to_cart>0){
            qty_cart_total += qty_add_to_cart;
        }else{
            qty_add_to_cart = 1;
            qty_cart_total += 1;
        }
        // console.log(qty_cart_total);
        //lấy số lượng sp tăng lên thay vào giỏ hàng
        parseInt($(this).closest("body").find("a.total_cart").html('<i class="fas fa-cart-plus"><span style="color:blue"> '+ qty_cart_total
            + '</span></i>'));
        //Scroll to top if cart icon is hidden on top
        $('html, body').animate({
            'scrollTop' : $(this).closest("body").find("a.total_cart").position().top,
        });

        //Select item image and pass to the function
        var itemImg = $(this).parent().find('i#fly').eq(0);
        flyToElement($(itemImg), $($(this).closest("body").find("a.total_cart")));

        $.ajax({
            url:"/gio-hang/them-san-pham/"+ id_product,
            data:{
                qty_cart_total:qty_cart_total,
                qty_add_to_cart:qty_add_to_cart,
                id_product: id_product,
            type:'POST',
            },
            success:function(data){
                console.log(data.success);
            }
        });
    });
    //change the card number
    $('input').focusin(function(){
        //get the number cart before change
        $(this).data('val', $(this).val());
     });

    $('.qty_cart').change(function(){  
        //get the number cart before change
        var cart_number_current = $(this).data('val');
        console.log(cart_number_current);
        let rowId_product = $(this).attr('id');
        let cart_number_change = parseInt($(this).val());
        console.log(cart_number_change);
        let qty_cart_total = parseInt($(this).closest("body").find("a.total_cart").text());

        if(cart_number_change>cart_number_current){
            let cart_number = cart_number_change - cart_number_current;
            qty_cart_total += cart_number;
            parseInt($(this).closest("body").find("a.total_cart").html('<i class="fas fa-cart-plus"><span style="color:blue"> '+ qty_cart_total
            + '</span></i>'));
            let price = $(this).closest(".card-body").find("h5.price").text();
            price = parseInt(price.replaceAll(",", ""));
            // console.log(price);
            let total_price = $(this).closest(".card").siblings("div.card").find("#total_money").text();
            console.log(total_price);
            total_price = total_price.replaceAll(",", "");
            total_price = total_price.replace("(VND)", "");
            total_price = parseInt(total_price) + cart_number * price;
            // console.log(total_price);
            let subtotal  = parseInt($(this).closest("body").find("h4#subtotal").html('<h4 id="subtotal">Tổng ' + qty_cart_total + ' Sản Phẩm : <span id="total_money" style="color: blue">' + parseFloat(total_price).toLocaleString('vn-VN') +' (VND)</span></h4>'));
                $.ajax({
                url:"/gio-hang/tang-so-luong/"+ rowId_product,
                data:{
                    // qty_cart_total:qty_cart_total,
                    qty_add_to_cart:cart_number,
                    id: rowId_product,
                type:'GET',
                },
                success:function(data){
                    // console.log(data.success);
                }
            });
        } 
        if(cart_number_change < cart_number_current){
            let cart_number = cart_number_current - cart_number_change;
            // console.log(this.defaultValue);
            // console.log(cart_number);
            qty_cart_total -= cart_number;
            // console.log(qty_cart_total);
            parseInt($(this).closest("body").find("a.total_cart").html('<i class="fas fa-cart-plus"><span style="color:blue"> '+ qty_cart_total
            + '</span></i>'));
            let price = $(this).closest(".card-body").find("h5.price").text();
            // console.log(price);
            price = parseInt(price.replaceAll(",", ""));
            
            let total_price = $(this).closest(".card").siblings("div.card").find("#total_money").text();
            total_price = total_price.replaceAll(",", "");
            total_price = total_price.replace("(VND)", "");
            total_price = parseInt(total_price) - cart_number * price;

            // console.log(parseInt(total_price));
            let subtotal  = parseInt($(this).closest("body").find("h4#subtotal").html('<h4 id="subtotal">Tổng ' + qty_cart_total + ' Sản Phẩm : <span id="total_money" style="color: blue">' + parseFloat(total_price).toLocaleString('vn-VN') +' (VND)</span></h4>'));
                $.ajax({
                url:"/gio-hang/giam-so-luong/"+ rowId_product,
                data:{
                    // qty_cart_total:qty_cart_total,
                    qty_add_to_cart:cart_number,
                    id: rowId_product,
                type:'GET',
                },
                success:function(data){
                    // console.log(data.success);
                }
            });
        }
    });

    //filter with price
    let select_price = $("select[name  = select_price]");
    $(select_price).change(function(){
        value_price_field = $(this).val();
        let pathname = window.location.pathname;
        window.location.href = pathname + '?price_field='+ value_price_field;
    });

    //rating
    $j('.ratings_stars').hover(
        // Handles the mouseover
        function() {
            $j(this).prevAll().andSelf().addClass('ratings_hover');
            // $(this).nextAll().removeClass('ratings_vote'); 
        },
        function() {
            $j(this).prevAll().andSelf().removeClass('ratings_hover');
            // set_votes($(this).parent());
        }
    );

    $j('.ratings_stars').click(function(){
        //kiểm tra login trước khi đánh giá
        var checkLogin = $j(this).closest(".container-fluid").find(".user_id").attr('id');
        console.log(checkLogin);
        if(checkLogin){
            var Values =  $j(this).find("input").val();
            var id_product = $j(this).closest(".container-fluid").find(".add-to-cart").attr('id');
            // console.log(id_product);
            alert('Cảm Ơn Bạn Đã Đánh Giá '+ Values +" Sao!!");
            if ($j(this).hasClass('ratings_over')) {
                $j('.ratings_stars').removeClass('ratings_over');
                $j(this).prevAll().andSelf().addClass('ratings_over');
            } else {
                $j(this).prevAll().andSelf().addClass('ratings_over');
            }
            $j.ajax({
                type:'GET',
                url:"/danh-gia",
                data:{
                    rating:Values,
                    product_id: id_product
                },
                success:function(data){
                    // console.log(data.success);
                    console.log(Values);
                }
            });
        }else{
            alert("Vui lòng login để đánh giá sản phẩm");
        }
    });
    
    //comment
    $('.send').click(function(){
        //kiểm tra login trước khi đánh giá
        var checkLogin = $(this).closest(".container-fluid").find(".user_id").attr('id');
        // console.log(checkLogin);
        if(checkLogin){
            var comment =  $(this).closest("form").find("textarea").val();
            console.log(comment);
            if(comment == ""){
                alert("Bình luận không được để trống");
            }else{
                var user_name = $(this).closest(".container-fluid").find(".user_name").val();
                var user_image = $(this).closest(".container-fluid").find(".user_image").val();
                var id_product = $(this).closest(".container-fluid").find(".add-to-cart").attr('id');
                var currentdate = new Date(); 
                var datetime = currentdate.getDate() + "-"
                            + (currentdate.getMonth()+1)  + "-" 
                            + currentdate.getFullYear() + " "  
                            + currentdate.getHours() + ":"  
                            + currentdate.getMinutes() + ":" 
                            + currentdate.getSeconds();
                alert("Cam on ban da binh luan");
                var html="";
                html += 
                '<div style="margin-bottom:30px" class="media">'+
                    '<img width="50px" height="50px" class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="http://venus-cosmetic-shop.test/admin/images/user/'+user_image+'"/>'+
                    '<div class="media-body">'+
                        '<div class="row">'+
                            '<div class="col-9 d-flex">'+
                                '<h5 class="col-5">'+user_name+'</h5>'+
                                '<span class="col-4" style="margin-left:80px"><i class="fa fa-clock" aria-hidden="true"></i> '+ datetime +'</span>'+
                            '</div>'+
                            '<div class="col-3">'+
                                '<div class="pull-right reply">'+
                                    '<a class="delete-comment" href="#"><span><i class="fa fa-times"></i> Xóa Bình Luận</span></a>'+
                                '</div>'+
                            '</div>'+
                            '<p style="margin-left:12px" >'+ comment +'</p>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $(this).closest(".container-fluid").find(".content_area").append(html);
                $j.ajax({
                    type:'GET',
                    url:"/binh-luan",
                    data:{
                        comment:comment,
                        product_id: id_product
                    },
                    success:function(data){
                        // console.log(data.success);
                    }
                });
            }
            
        }else{
            alert("Vui lòng login để bình luận sản phẩm");
        }
    });

    //delete comment
    $('a.delete-comment').click(function(){
        //kiểm tra login trước khi đánh giá
        var checkLogin = $(this).closest(".container-fluid").find(".user_id").attr('id');
        console.log(checkLogin);
        if(checkLogin){
            if(confirm("Bạn chắc chắn muốn xóa!!")){
                var id_comment =  $(this).attr('id');
                $(this).closest(".media").remove();
                $.ajax({
                    type:'GET',
                    url:'/binh-luan/xoa/',
                    data:{
                        id_comment: id_comment
                    },
                    success:function(data){
                        // console.log(data.success);
                    }
                });
            } 
            return false;
        }else{
            alert("Vui lòng login để bình luận sản phẩm");
        }
    });
});