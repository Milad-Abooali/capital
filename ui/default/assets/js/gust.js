
// Ajax Call- Core
var AjaxLock;
async function AjaxCall(callClass, callFunction, data=null, callback) {
    if (AjaxLock == callClass+callFunction) return;
    AjaxLock = callClass+callFunction;
    $.ajax({
        type: "POST",
        url: "lib/ajax.php?c="+callClass+'&f='+callFunction+"&t=2bf06187d3efc5de29a11218aa1a48d0",
        data: data,
        cache: false,
        global: true,
        async: true,
        success: callback,
        error: function(request, status, error) {
            console.log('change to DevMod to see Error!');
        }
    });
    $( document ).ajaxComplete(function( event, xhr, settings ) {
        setTimeout(function() {
            AjaxLock = null;
        }, 50);
    });
}