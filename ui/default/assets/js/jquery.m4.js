/**
 * Ajax Call
 */
(function ( $ ) {

    var appToken = $("meta[name=app-t]").attr('content');

    $.fn.m4_Ajax = function( options ) {
        var settings = $.extend({
            function: "test",
            class: "global",
            callback:
        }, options );
        this.each(function() {
            alert(appToken);
        });
        return this;
    };
}( jQuery ));