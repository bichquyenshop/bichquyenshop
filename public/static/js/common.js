function call_ajax(element){
    var data_id = $(element).attr('data-id');
    var data_method = $(element).attr('data-method');
    var data_action = $(element).attr('data-action');
    if(data_id && data_method && data_action && data_id > 0){
        $.ajax({
            method: data_method,
            url: data_action,
            type: 'json',
            data: {"id" : data_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if(response.error == 0){
                    $.growl.notice({title: "Thành công", message: response.message });
                    location.reload();
                } else if(response.error == 1){
                    $.growl.error({title: "Error", message: response.message });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $.growl.error({title: "Error", message: xhr.responseJSON.message });
            }
        });
       
    } else {
        $.growl.error({title: "Error", message: "Dữ liệu không chính xác" });
    }
}

function refresh_secret_key(){
    $.ajax({
        method: 'GET',
        url: '/merchants/refresh_secret_key',
        type: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var data_name = $('#refresh_secret').attr('data-name');
            $('#'+data_name).val(response.secret_key);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $.growl.error({title: "Error", message: xhr.responseJSON.message });
        }
    });
}

$(document).ready(function() {
    $('.sidebar-menu').tree();
    
    $('.ajax_action').click(function(){
        var self = this;
        $.confirm({
            title: 'Xác nhận!',
            content: $(this).attr('data-label'),
            buttons: {
                confirm: function () {
                    call_ajax(self);
                },
                cancel: function () {
                },
                
            }
        });
        
    });

    $('#refresh_secret').click(function(){
        refresh_secret_key();
    });
});