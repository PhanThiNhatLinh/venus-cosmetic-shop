

$(document).ready(function(){
    let input_search_field= $("input[name  = search_field]");
	let input_search_value = $("input[name  = search_value]");
    let input_display_field = $("input[name  = display_field]");
    let select_display = $("select[name  = select_filter]");
    let pathname = window.location.pathname; 
    let search_params = new URLSearchParams(window.location.search); //return đoạn query ?filter_status=active

    //click search field 
    $("a.select-field").click(function(){
        let data_field = $(this).data('field');
        let field_name = $(this).text();
        $('button.btn-active-field').html(field_name + ' <span class="caret"></span>');
        input_search_field.val(data_field);
    });
    //click button Tim kiem
    $("#btn-search").click(function(){
        let $params = ['filter_status','display_field'];
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
        let $params = ['filter_status','display_field'];
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
  });