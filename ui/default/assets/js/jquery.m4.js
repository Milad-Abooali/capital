/**
 * Ajax Call
 */
(function ( $ ) {

    let appToken = $("meta[name=app-t]").attr('content');

    /* Example */
    $.fn.m4_Example = function( options ) {
        let settings = $.extend({
            call: "test",
            class: null,
            cache: false,
            global: true,
            async: true,
            callback: null
        }, options );
        this.each(function() {
            alert(appToken);
        });
        return this;
    };

    /* Ajax */
    let AjaxLock;
    $.fn.m4_Ajax = function( options ) {
        let settings = $.extend({
            function: "test",
            class: "global",
            callback: null,
        }, options );

        if ( AjaxLock === (settings.function+'/'+settings.class) ) {
            console.log('AjaxLock: '+AjaxLock);
            return;
        }
        AjaxLock = settings.function+'/'+settings.class;
        let url = (settings.class == null)
            ? ("ajax/"+settings.call+"?token="+appToken)
            : ("ajax/"+settings.call+"/"+settings.class+"?token="+appToken);
        $.ajax({
            type: "POST",
            url: url,
            data: this,
            cache: settings.cache,
            global: settings.global,
            async: settings.async,
            success: callback,
            error: function(request, status, error) {
                console.log(error);
            }
        });
        return this;
    };

}( jQuery ));

// Ajax Call- Core
let AjaxLock;
function ajaxCall (callClass, callFunction, data=null, callback) {
    if (AjaxLock == callClass+callFunction) {
        console.log('AjaxLock: '+AjaxLock);
        return;
    }
    AjaxLock = callClass+callFunction;
    $.ajax({
        type: "POST",
        url: "lib/ajax.php?c="+callClass+'&f='+callFunction+"&t=<?= TOKEN ?>",
        data: data,
        cache: false,
        global: true,
        async: true,
        success: callback,
        error: function(request, status, error) {
            console.log(error);
        }
    });
    $( document ).ajaxComplete(function( event, xhr, settings ) {
        setTimeout(function() {
            AjaxLock = null;
        }, 50);
    });
}