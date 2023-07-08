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
        qty_cart_total += 1;
        console.log(qty_cart_total);
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
                id_product: id_product,
            type:'POST',
            },
            success:function(data){
                console.log(data.success);
            }
        });
    });

});