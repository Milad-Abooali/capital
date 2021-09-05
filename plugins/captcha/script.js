$(function (){
    let ajaxOptions = {
        call:'plugins',
        plugin:"captcha",
        plugin_call:"captcha",
        crud:1,
    };
    $(this).m4_Ajax(ajaxOptions, function(call){
        $(".plugin-captcha-img").html(call);
    });

});

alert(1);