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

    $('body').on('submit','form#form-register', function(e)
    {
        e.preventDefault();
        if($('#re-password').val() === $('#password').val()){
            let ajaxOptions = {
                call:'add',
                file:'user',
                type:'form'
            };
            $(this).m4_Ajax(ajaxOptions, function(call){
                if(call.res) {
                    toastr["error"](call.res.e)
                } else {
                    toastr["success"](call.res.data)
                }
            });
        } else {
            toastr["error"]("Password and confirm password does not match!")
        }
    });


