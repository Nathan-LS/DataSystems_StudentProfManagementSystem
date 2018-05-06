var popnotify = function(resp){
    if (resp == null){
        $('#m_error_text').text("Something went wrong");
        $('#m_error_close').attr("href","#");
        $('#m_error').modal();

    }
    else if (resp.error == 0){
        $('#m_ok_text').text(resp.message);
        $('#m_ok_close').attr("href",resp.link);
        $('#m_ok').modal();
    }
    else if (resp.error == 1){
        $('#m_error_text').text(resp.message);
        $('#m_error_close').attr("href",resp.link);
        $('#m_error').modal();
    }
    else{
        $('#m_error_text').text("Something went wrong");
        $('#m_error_close').attr("href","#");
        $('#m_error').modal();
    }
};

jQuery("#load_form,#login_cont").on("click","#create_submit, #login_button",function(event){
    event.preventDefault();
    var to_submit = $("#s_form, #login_form").serialize();
    var formLink = $("#s_form, #login_form").attr('action');
    jQuery('#load_form, #login_cont').find('input, select, button').prop('disabled', true);

    $.post(formLink,to_submit)
        .done(function(data){
            popnotify(JSON.parse(data));
        })
        .fail(function(){
            popnotify(null);
        })
        .always(function(){
            jQuery('#load_form, #login_cont').find('input, select, button').prop('disabled', false);
        });
});

jQuery("button.list-group-item").click(function () {
    var formLink = $(this).attr('href');
    jQuery(this).addClass('active').siblings().removeClass('active');
    jQuery(this).addClass('disabled').siblings().removeClass('disabled');
    $('#load_form').load(formLink,'', function(){
        jQuery('#load_form').hide().fadeIn(1000);
    });
});

jQuery("#login_form").on("click","#register_button",function(event){
    $("#login_cont").load("additional/forms/create_student.php #s_form");
    jQuery('#login_cont').hide().fadeIn(1000);
});

jQuery("#m_error, #m_ok").on("click", "#m_error_close, #m_ok_close",function(){
    var link = jQuery(this).attr('href');
    window.location.href = link;
});