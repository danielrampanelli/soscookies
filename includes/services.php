<?php
    
class soscookies_services {
    
    private static $services;

    public static function get() {
        if (empty(self::$services)) {
            self::$services = array(
                'analytics' => array(
                    'name' => 'Google Analytics',
                    'description' => _x('Statistic data collector', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.google.com/intl/it_ALL/analytics/learn/privacy.html',
                    ),
                ),
                'youtube' => array(
                    'name' => 'YouTube',
                    'description' => _x('YouTube embedded videos', 'services', 'soscookies'),
                    'urls' => array(
                        'https://www.youtube.com/yt/policyandsafety/',
                    ),
                ),
                'vimeo' => array(
                    'name' => 'Vimeo',
                    'description' => _x('Vimeo embedded videos', 'services', 'soscookies'),
                    'urls' => array(
                        'https://vimeo.com/privacy',
                    ),
                ),
                'google' => array(
                    'name' => 'Google+',
                    'description' => _x('Google+ Social media sharing', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.google.com/intl/it/policies/technologies/types/',
                        'https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage',
                    ),
                ),
                'facebook' => array(
                    'name' => 'Facebook',
                    'description' => _x('Facebook Social media sharing', 'services', 'soscookies'),
                    'urls' => array(
                        'https://www.facebook.com/help/cookies/?ref=sitefooter',
                        'https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xpa1/t39.2365-6/851576_193932070769264_1415834022_n.pdf',
                    ),
                ),
                'twitter' => array(
                    'name' => 'Twitter',
                    'description' => _x('Twitter Social media sharing', 'services', 'soscookies'),
                    'urls' => array(
                        'https://support.twitter.com/articles/20170514',
                    ),
                ),
                'linkedin' => array(
                    'name' => 'LinkedIn',
                    'description' => _x('Facebook Social media sharing', 'services', 'soscookies'),
                    'urls' => array(
                        'https://www.linkedin.com/legal/cookie-policy?trk=hb_ft_cookie',
                    ),
                ),
                'googlefonts' => array(
                    'name' => 'Google Fonts',
                    'description' => _x('Directory of free hosted application programming interfaces for web fonts', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.google.com/policies/privacy/',
                    ),
                ),
                'addthis' => array(
                    'name' => 'Add This',
                    'description' => _x('Social media sharing', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.addthis.com/privacy/privacy-policy',
                    ),
                ),
                'googlemaps' => array(
                    'name' => 'Google Maps',
                    'description' => _x('Online mapping platform.', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.google.com/policies/privacy/',
                    ),
                ),
                'disqus' => array(
                    'name' => 'Disqus',
                    'description' => _x('Discussion platform.', 'services', 'soscookies'),
                    'urls' => array(
                        'https://help.disqus.com/customer/portal/articles/466259-privacy-policy',
                    ),
                ),
                'issuu' => array(
                    'name' => 'Issuu',
                    'description' => _x('Social media sharing.', 'services', 'soscookies'),
                    'urls' => array(
                        'http://issuu.com/legal/privacy',
                    ),
                ),
                'tripadvisor' => array(
                    'name' => 'Trip Advisor',
                    'description' => _x('Trip Advisor review platform for travel-related content.', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.tripadvisor.it/pages/privacy.html',
                    ),
                ),
                'holidaycheck' => array(
                    'name' => 'Holiday Check',
                    'description' => FALSE,
                    'urls' => array(
                        'http://www.holidaycheck.it/protezione-dati.php',
                    ),
                ),
                'ilmeteo' => array(
                    'name' => 'ilmeteo.it',
                    'description' => _x('Weather forecasting service.', 'services', 'soscookies'),
                    'urls' => array(
                        'http://www.ilmeteo.it/portale/privacy',
                    ),
                ),
            );
        }
        
        return self::$services;
    }
    
}
    
?>