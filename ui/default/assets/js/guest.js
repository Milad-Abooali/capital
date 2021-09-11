/**
 * Guests Pages
 */

    $('body').on('submit','form#form-register', function(e)
    {
        e.preventDefault();
        let ajaxOptions = {
            call:'add',
            file:'user',
            type:'form'
        };
        $(this).m4_Ajax(ajaxOptions, function(call){
            if(call.res);
        });
    });


