// <![CDATA[
;(function($) {
    cc.initialise({
        cookies: soscookies.cookies,
        settings: soscookies.settings,
        strings: soscookies.strings
    });
    
    window['soscookies'] = {
        _consentUsersByScrolling: true,
        consentUsersBasedOnTheirScrollingActivity: function(enabled) {
            soscookies._consentUsersByScrolling = enabled;
        }
    };
    
    $(document).on('click', '.triggers-cookies-preferences', function(e) {
        e.preventDefault();
        
        if (!!window['cc']) {
            cc.showmodal();
        }
        
        return false;
    });
    
    $(document).on('ready', function(e) {
        var scrollHandler;
        var clickHandler;
        
        if (!!window['customizeSosCookiesOptions']) {
            customizeSosCookiesOptions();
        }
        
        setTimeout(function() {
            if (soscookies._consentUsersByScrolling) {
                scrollHandler = $(window).on('scroll', function(e) {
                    if ($(window).scrollTop() > (($(window).height() / 4.0) * 3.0)) {
                        cc.onconsentgivenbyinteraction();
                        
                        $(window).off('scroll', scrollHandler);
                        scrollHandler = null;
                    }
                });
            }
        }, 500);
        
        $('.contains-cookie-policy-disclosure *:link').each(function() {
            $(this).addClass('cc-link');
        });
        
        clickHandler = $(document).on('click', function(e) {
            if ($(e.srcElement).closest('.contains-cookie-policy-disclosure').length == 0) {
                cc.onconsentgivenbyinteraction();
                $(document).off('click', clickHandler);
                clickHandler = null;
            }
        });
    });
    
})(jQuery);
// ]]>