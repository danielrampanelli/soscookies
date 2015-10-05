// <![CDATA[
;(function($) {
    cc.initialise({
        cookies: soscookies.cookies,
        settings: $.extend(soscookies.settings, {
            privacyPolicyLinkTarget: '_blank'
        }),
        strings: soscookies.strings
    });
    
    function consentHasBeenSomehowGiven() {
        var somethingWasApproved = false;
        
        $.each(cc.cookies, function(name, value) {
            if (value.asked) {
                somethingWasApproved = true;
            }
        });
        
        return somethingWasApproved;
    }
    
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
            if (!consentHasBeenSomehowGiven() && consentUsersByScrolling) {
                scrollHandler = $(window).on('scroll', function(e) {
                    if ($(window).scrollTop() >= 42) {
                        if (!consentHasBeenSomehowGiven()) {
                            cc.onconsentgivenbyinteraction();
                        }
                        
                        $(window).off('scroll', scrollHandler);
                        scrollHandler = null;
                    }
                });
            }
        }, 500);
        
        $('.contains-cookie-policy-disclosure *:link').each(function() {
            $(this).addClass('cc-link');
        });
        
        if (!consentHasBeenSomehowGiven()) {
            setTimeout(function() {
                clickHandler = $(document).on('click', function(e) {
                    if ($(e.target).closest('.cc-link, #cc-notification, .contains-cookie-policy-disclosure').length == 0) {
                        if (!consentHasBeenSomehowGiven()) {
                            cc.onconsentgivenbyinteraction();
                        }
                    
                        $(document).off('click', clickHandler);
                        clickHandler = null;
                    }
                });
            }, 500);
        }
        
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