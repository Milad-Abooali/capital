$(function (){
    let appToken = $("meta[name=app-t]").attr('content');
    let captcha = "http://capital/ajax/plugins/?token="+appToken+"&plugin=captcha&call=rerender&crude=1";
    $(".plugin-captcha").html(
        "<img src='"+captcha+"' alt='captcha'>"
    );

    $("body").on('click','.plugin-captcha#recaptcha',function () {

    })

});
