/**
 * Guests Pages
 */

    $('body').on('click','div > p', function() {
        $(this).m4_Ajax(null,function(call){
            console.log(call.res);
        });
    });


