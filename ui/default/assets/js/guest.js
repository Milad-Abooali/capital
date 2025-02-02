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

    /* Register */
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
                if(call.res.e) {
                    toastr["error"](call.res.e)
                } else if(call.res.data) {
                    toastr["success"]("Your account has been created.");
                    $('form#form-register').hide();
                    setTimeout(function(){
                        window.location.href = "dashboard";
                    }, 2000);
                }
            });
        } else {
            toastr["error"]("Password and confirm password does not match!");
            $('#re-password').addClass('is-invalid');
        }
    });

    /* Login */
    $('body').on('submit','form#form-login', function(e)
    {
        e.preventDefault();
        if($('#password').val().length > 3 && $('#email').val().length>5 ){
            let ajaxOptions = {
                call:'login',
                file:'user',
                type:'form'
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
        } else {
            toastr["error"]("Email / Password does not match!");
            $('#re-password').addClass('is-invalid');
        }
    });

    /* Recover */
    $('body').on('submit','form#form-recovery', function(e)
    {
        e.preventDefault();
        if( $('#email').val().length>5 ){
            let ajaxOptions = {
                call:'recoverPass',
                file:'user',
                type:'form'
            };
            $(this).m4_Ajax(ajaxOptions, function(call){
                if(call.res.e) {
                    toastr["error"](call.res.e)
                } else if(call.res.data === 1) {
                    toastr["success"]("Recover pin code sent successfully");
                    $('form#form-register').hide();
                    setTimeout(function(){
                      //  window.location.href = "dashboard";
                    }, 2000);
                } else if(call.res.data === 0) {
                    toastr["error"]("Email is not found!");
                }
            });
        } else {
            toastr["error"]("Email is not in right format!");
            $('#email').addClass('is-invalid');
        }
    });