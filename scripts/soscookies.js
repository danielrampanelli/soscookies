// <![CDATA[
;(function($) {
    cc.initialise({
        cookies: soscookies.cookies,
        settings: $.extend(soscookies.settings, {
            privacyPolicyLinkTarget: '_blank'
        }),
        strings: soscookies.strings
    });
    
    $(document).on('click', '.triggers-cookies-preferences', function(e) {
        e.preventDefault();
        
        if (!!window['cc']) {
            cc.showmodal();
        }
        
        return false;
    });
    
    $(document).on('ready', function(e) {
        var consentUsersByScrolling = true;
        var showPolicyPageLink = true;
        var scrollHandler;
        var clickHandler;
        
        if (!!window['consentUsersBasedOnTheirScrollingActivity']) {
            consentUsersByScrolling = consentUsersBasedOnTheirScrollingActivity();
        }
        
        setTimeout(function() {
            if (consentUsersByScrolling) {
                scrollHandler = $(window).on('scroll', function(e) {
                    if ($(window).scrollTop() >= 42) {
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
            if ($(e.srcElement).closest('.cc-link, .contains-cookie-policy-disclosure').length == 0) {
                cc.onconsentgivenbyinteraction();
                $(document).off('click', clickHandler);
                clickHandler = null;
            }
        });
        
        if (!!window['showCookiePolicyPageLink']) {
            showPolicyPageLink = showCookiePolicyPageLink();
        }
        
        if (!showPolicyPageLink) {
            $('#cc-privacy-policy')
                .closest('li')
                .remove();
        }
    });
    
})(jQuery);
// ]]>