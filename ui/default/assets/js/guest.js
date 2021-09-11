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
            if(call.res) {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "3000",
                    "hideDuration": "10000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["error"](call.res.e)

            }
        });
    });


