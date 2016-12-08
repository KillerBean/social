;(function ($) {
var search_bar = $('#search_for');
search_bar.on('keypress', function(e){
    if(e.which == 13){
        if(search_bar.val != "")
            window.location = "/search/" + encodeURIComponent(search_bar.val());
    }
});
})(window.jQuery);
