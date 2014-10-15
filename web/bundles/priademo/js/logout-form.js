$( document ).ready(function() {
    $( "#logout" ).click(function( event ) {
        event.preventDefault();
        $.get($(this).attr('href'), function( data ) {
            var success = data.success;
            if (success){
                console.log(data.message);
                window.location.replace(data.redirectURL);
            } else {

            }
        });
    });
});