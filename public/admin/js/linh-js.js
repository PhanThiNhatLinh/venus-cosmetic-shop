

$(document).ready(function(){
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let input_slug= $("input[name  = slug]");
    let input_search_field= $("input[name  = search_field]");
	let input_search_value = $("input[name  = search_value]");
    let input_display_field = $("input[name  = display_field]");
    let input_status_field = $("input[name  = order_status]");
    let input_level = $("input[name  = level_field]");
    let input_permission = $("input[name  = modules_field]");
    let select_display = $("select[name  = select_filter]");
    let select_level = $("select[name  = select_level]");
    let select_role = $("select[name  = role]");
    let select_status = $("select[name  = status]");
    let select_status_filter = $("select[name  = order_status]");
    let select_permission = $("select[name  = select_permission]");
    let select_permission_area = $("select[name  = permission_area]");
    let select_permission_name = $("select[name  = permission_name]");
    let select_price_shock = $("select[name  = price_shock]");
    // console.log(select_level);
    let pathname = window.location.pathname; 
    let search_params = new URLSearchParams(window.location.search); //return đoạn query ?filter_status=active

    //this will execute on page load(to be more specific when document ready event occurs)
    /*
    if ($('.ty-compact-list').length > 3) {
        $('.ty-compact-list:gt(2)').hide();
        $('.show-more').show();
    }
    */
    $('.ty-compact-list').hide();
    $('.show-more').on('click', function() {
        //toggle elements with class .ty-compact-list that their index is bigger than 2
        $(this).siblings('.ty-compact-list').toggle();
        //change text of show more element just for demonstration purposes to this demo
        $(this).text() === 'Xem Toàn Bộ Quyền' ? $(this).text('Thu gọn') : $(this).text('Xem Toàn Bộ Quyền');
    });

    //video in price_shock show
    $("div#video").hide();
    $(select_price_shock).click(function(){
        let val = $(this).find("option:selected").val();
        
      if(val == 'yes'){
        $("div#video").show();
      }else{
        $("div#video").hide();
      }
     });

    //click search field 
    $("a.select-field").click(function(){
        let data_field = $(this).data('field');
        let field_name = $(this).text();
        $('button.btn-active-field').html(field_name + ' <span class="caret"></span>');
        input_search_field.val(data_field);
    });
    //click button Tim kiem
    $("#btn-search").click(function(){
        let $params = ['filter_status','display_field','filter_status_order','modules_field'];
        let search_field = input_search_field.val();
        let search_value = input_search_value.val();
        if(search_value.replace(/\s/g,"") == ""){  
            alert('vui lòng nhập nội dung tìm kiếm');
        }else{
            let link ='';
            $.each($params, function(key, param){
                if(search_params.has(param)){
                    link += param + "=" + search_params.get(param) +"&"; // link => filter_status=active&
                }
            });
            window.location.href = pathname + '?'+ link + 'search_field='+ search_field + '&search_value=' + search_value;
        }
    });
    //click button Xoa tim kiem
    $("button#btn-clear").click(function(){
        let $params = ['filter_status','display_field','filter_status_order','modules_field'];
        let link ='';
        $.each($params, function(key, param){
            if(search_params.has(param)){
                link += param + "=" + search_params.get(param) +'&'; // link => filter_status=active&
            }
        });
        window.location.href = pathname + '?'+ link;
    });
    //click the icon delete, the form confirm will appear
    $('a.btn-delete').click(function(){
        if(!confirm("Bạn chắc chắn muốn xóa!!")) 
        return false;
    });  

    //click the icon cancel order, the form confirm will appear
    $('a#order_cancel').click(function(){
        if(!confirm("Bạn chắc chắn muốn hủy đơn hàng này!!")) 
        return false;
    });  

    $(select_display).change(function(){
        let $params = ['filter_status','search_field','search_value'];
        let value_display = $(this).val(); //get value of option selected
        input_display_field.val(value_display); // give this value for input element
        let link ='';
        $.each($params, function(key, param){
            if(search_params.has(param)){
                link += param + "=" + search_params.get(param) +"&"; // link => filter_status=active&&search_field=all&search_value=abc
            }
        });
        window.location.href = pathname + '?'+ link + 'display_field='+ value_display;
    });

    //for permission page only - filter with permission area
    $(select_permission).change(function(){
        let $params = ['search_field','search_value'];
        let value_permission = $(this).val(); //get value of option selected
        input_permission.val(value_permission); // give this value for input element
        let link ='';
        $.each($params, function(key, param){
            if(search_params.has(param)){
                link += param + "=" + search_params.get(param) +"&"; // link => filter_status=active&&search_field=all&search_value=abc
            }
        });
        window.location.href = pathname + '?'+ link + 'modules_field='+ value_permission;
    });

    //for permission page only - filter with permission
    $(select_level).change(function(){
        let $params = ['filter_status','search_field','search_value'];
        let value_level = $(this).val(); //get value of option selected
        input_level.val(value_level); // give this value for input element
        let link ='';
        $.each($params, function(key, param){
            if(search_params.has(param)){
                link += param + "=" + search_params.get(param) +"&"; // link => filter_status=active&&search_field=all&search_value=abc
            }
        });
        window.location.href = pathname + '?'+ link + 'filter_level='+ value_level;
    });
        
    //for user page only - change the role
    $(select_role).change(function(){
        //get value of option selected after click change level
        let value_role = $(this).val();
        let data_url = $(this).attr('data-url'); //use this to get data_url of each option
        let data_url_new = data_url.replace("new_value", value_role);
        window.location.href = data_url_new; 
    });

    //for order page only - change the status of order
    $(select_status).change(function(){
        //get value of option selected after click change level
        let value_status = $(this).val();
        console.log(value_status);
        let data_url = $(this).attr('data-url'); //use this to get data_url of each option
        let data_url_new = data_url.replace("new_status", value_status);
        window.location.href = data_url_new; 
    });

    //for order page only - filter with the status of order
    $(select_status_filter).change(function(){
        let $params = ['search_field','search_value'];
        let value_status_field = $(this).val(); //get value of option selected
        input_status_field.val(value_status_field); // give this value for input element
        let link ='';
        $.each($params, function(key, param){
            if(search_params.has(param)){
                link += param + "=" + search_params.get(param) +"&"; 
            }
        });
        window.location.href = pathname + '?'+ link + 'filter_status_order='+ value_status_field;
    });

    //confirm save with edit form
    var ckeditor_changed = false;
    var form = $('#form_edit');
    CKEDITOR.instances.ckeditor.on('change', function() { 
        ckeditor_changed = true;
    }); 
    original = form.serialize();
    console.log(original);
    form.submit(function(){
        window.onbeforeunload = null
    })
    window.onbeforeunload = function(){
        if (form.serialize() != original || ckeditor_changed == true){
            return 'Changes you made may not be saved? ';  
        }      
    }
    
    //confirm save with add form
    var form1 = $('#form_add');
    original = form1.serialize();
    console.log(original);
    form1.submit(function(){
        window.onbeforeunload = null
    })
    window.onbeforeunload = function(){
        if (form1.serialize() != original || ckeditor_changed == true){
            return 'Changes you made may not be saved? ';  
        }      
    }
    //delete thumbs checked in the edit form
    $(".delete_thumb").click(function(){
        let image_name = $(this).val();
        let src= 'http://venus-cosmetic-shop.test/admin/images/product/'+image_name;
        let img = $(`img[src\$='${src}']`);
        $(img).hide();
        $(this).hide();
        window.onbeforeunload = function(){
            return 'Changes you made may not be saved?';
        }
    });

  });