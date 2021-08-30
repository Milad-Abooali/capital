/**
 * Guests Pages
 */

    $('body').on('submit','form#register', function(e)
    {
        e.preventDefault();
        $(this)
            .serialize()
            .m4_Ajax(null,function(call){
                console.log(call.res);
            });
    });


