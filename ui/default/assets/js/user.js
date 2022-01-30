/**
 * Guests Pages
 */

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


    /* Logout */
    $('body').on('click','.doA-logout', function()
    {
            let ajaxOptions = {
                call:'logout',
                file:'user'
            };
            $(this).m4_Ajax(ajaxOptions, function(call){
                if(call.res.e) {
                    toastr["error"](call.res.e)
                } else if(call.res.data === 1) {

                    $.when( toastr["success"]("Logout successfully.") )
                        .then( window.location.reload(true) );
                }
            });
    });