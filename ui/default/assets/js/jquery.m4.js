/**
 * Ajax Call
 */
(function ( $ ) {

    let appToken = $("meta[name=app-t]").attr('content');

    /* Example */
    $.fn.m4_Example = function( options ) {
        let settings = $.extend({
            sample: "test",
            callback: null
        }, options );
        this.each(function() {
            alert(sample);
        });
        return this;
    };

    /* Ajax */
    let AjaxLock;
    $.fn.m4_Ajax = function( options ) {
        let settings = $.extend({
            call: "test",
            class: null,
            cache: false,
            global: true,
            async: true,
            callback: null
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
            success: settings.callback,
            error: function(request, status, error) {
                console.log(error);
                return false;
            }
        });
        $( document ).ajaxComplete(function( event, xhr, settings ) {
            setTimeout(function() {
                AjaxLock = null;
            }, 50);
        });
        return true;
    };

}( jQuery ));
