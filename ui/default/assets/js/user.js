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


    /* Login */
    $('body').on('click','doA-logout', function()
    {
        if($('#password').val().length > 3 && $('#email').val().length>5 ){
            let ajaxOptions = {
                call:'logout',
                file:'user'
            };
            $(this).m4_Ajax(ajaxOptions, function(call){
                if(call.res.e) {
                    toastr["error"](call.res.e)
                } else if(call.res.data === 1) {
                    toastr["success"]("You are logged in.");
                    $('form#form-register').hide();
                    setTimeout(function(){
                        window.location.href = "dashboard";
                    }, 2000);
                } else if(call.res.data === 0) {
                    toastr["error"]("Password is not much the user!");
                }
            });
    });