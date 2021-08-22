/**
 * Meta Vars
 */
var appT = $("meta[name=codebox-js]").attr('app-t');


/**
 * Guests Pages
 */

    $('body').on('click','div', function() {
        $(this).m4_Ajax();
        alert(this);
    });


