$( document ).ready(function() {
    var login_success_url    = $('#login-success').val();
    var login_container      = $('#login-container');
    var login_container_open = $('#login-container-open');
    var submit      = $('#_submit');
    var username    = $('#_username');
    var password    = $('#_password');
    var errors		= [];
    var err_msg_len = 0;
    var err_msg 	= "";

    function pushErroMsg(msg) {
        errors.push(msg);
        err_msg_len = (err_msg_len < msg.length) ? msg.length : err_msg_len;
    }

    function updateOutput(html){
        html.split("</br>").forEach(function(element){
            console.log(element);
        });
    }

    login_container.hide();

    $( '.login-container-toggle span a' ).click(function( event ) {
        event.preventDefault();
    });

    $( '.login-container-toggle').click(function(){
        var id = $(this).attr('id');
        switch (id){
            case 'login-container-hide':
                login_container.hide();
                login_container_open.show();
                break;
            case 'login-container-open':
                login_container_open.hide();
                login_container.show();
                break;
        }
    });

    submit.on('click', function(){
        var form = $('#login-form');

        submit.attr("disabled", "disabled");

        errors		= [];
        err_msg_len = 0;
        err_msg 	= "";

        if (username.attr("data-required") == "true" && username.val() != ""){
            if (username.val().length < username.attr("data-min") || username.val().length > username.attr("data-max")) {
                pushErroMsg(username.attr( "data-error-len" ));
            }
        } else {
            pushErroMsg(username.attr( "data-error-required" ));
        }

        if (password.attr("data-required") == "true" && password.val() != ""){
            if (password.val().length < password.attr("data-min") || password.val().length > password.attr("data-max")) {
                pushErroMsg(password.attr( "data-error-len" ));
            }
        } else {
            pushErroMsg(password.attr( "data-error-required" ));
        }

        if (errors.length == 0) {
            updateOutput('Please wait...');
            $.ajax({
                url: form.attr('action'),
                data: form.serialize(),
                type: (form.attr('method')),
                dataType: 'html',
                success: function(data) {
                    var result = $.parseJSON(data);
                    var success = result.success;
                    if (success){
                        console.log('User has logged in.');
                        window.location.replace(login_success_url);
                    }
                },
                error:function(){
                    submit.removeAttr("disabled");
                }
            });
        } else {
            updateOutput("Warning!" +  "</br>" + errors.join('</br>'));
            submit.removeAttr("disabled");
        }
    });

    $.ajaxSetup({
        cache: false,
        beforeSend: function (xhr) {
            console.log('preparing data...');
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus + " : " + errorThrown);
        },
        complete : function(){
            console.log('completed.');
        },
        statusCode: {
            401: function(jqXHR, textStatus, errorThrown) {
                console.log('access denied!');
                console.log(textStatus + " : " + errorThrown);
            }
        }
    });

});