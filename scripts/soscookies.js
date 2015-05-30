// <![CDATA[
;(function($) {
    $(document).on('ready', function() {
        cc.initialise(soscookies.options);
        
        setTimeout(function() {
            cc.showbanner();
        }, 500);
    });
})(jQuery);
// ]]>