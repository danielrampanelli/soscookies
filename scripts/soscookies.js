// <![CDATA[
;(function($) {
    cc.initialise({
        cookies: soscookies.cookies,
        settings: soscookies.settings,
        strings: soscookies.strings
    });
    
    $(document).on('click', '.triggers-cookies-preferences', function(e) {
        e.preventDefault();
        
        if (!!window['cc']) {
            cc.showmodal();
        }
        
        return false;
    });
    
})(jQuery);
// ]]>