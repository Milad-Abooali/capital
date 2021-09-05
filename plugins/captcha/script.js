$(function (){
    let appToken = $("meta[name=app-t]").attr('content');

    let ajaxOptions = {
        call:'plugins',
        plugin:"captcha",
        plugin_call:"render",
        crud:1,
    };
    $(this).m4_Ajax(ajaxOptions, function(call){
        $(".plugin-captcha-img").html(call);
    });
    alert (appToken);
});
