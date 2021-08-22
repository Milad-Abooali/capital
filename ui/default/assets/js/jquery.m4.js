/**
 * Ajax Call
 */
(function ( $ ) {
    $.fn.m4_Ajax = function( options ) {
        var settings = $.extend({
            color: "#fff",
            backgroundColor: "white"
        }, options );
        this.each(function() {
            this.css({
                color: settings.color,
                backgroundColor: settings.backgroundColor
            });
        });
        return this;
    };
}( jQuery ));