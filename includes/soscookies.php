<?php

class soscookies {
    
    private static $yoastGoogleAnalyticsInstance;
    
    public static function option($name, $default = NULL) {
        $settings = get_option('soscookies_options');
        
        $value = $default;
        if (!empty($settings) && array_key_exists($name, $settings)) {
            $value = $settings[$name];
        }
        
        return $value;
    }
    
    private static function getPluginCookies() {
        $cookies = (object) array();
        
        $types = (array) self::option('cookie_types', array());
        foreach ($types as $type) {
            $cookies->{$type} = (object) array();
        }
        
        return $cookies;
    }
    
    private static function getPluginSettings() {
        $settings = (object) array(
            'consenttype' => self::option('consent_type', 'explicit'),
            'clickAnyLinkToConsent' => TRUE,
            'disableallsites' => TRUE,
            'tagPosition' => FALSE,
        );
        
        $policy = self::option('policy');
        if (!empty($policy)) {
            if (defined('icl_object_id') && defined('ICL_LANGUAGE_CODE')) {
                $policy = (int) icl_object_id($policy, 'page', TRUE, ICL_LANGUAGE_CODE);
            }
            
            $settings->privacyPolicy = get_permalink($policy);
        }
        
        $refresh = self::option('refresh_on_consent');
        $settings->refreshOnConsent = !empty($refresh);
        
        $settings->style = self::option('theme', 'dark');
        
        $settings->bannerPosition = self::option('banner', 'top');
        
        $tag = self::option('tag');
        if (!empty($tag)) {
            $settings->tagPosition = $tag;
        }
        
        return $settings;
    }
    
    private static function getPluginStrings() {
        $strings = (object) array();
        
        $strings->notificationTitle = _x('Your experience on this site will be improved by allowing cookies. If you continue browsing, you will accept their use.', 'notification', 'soscookies');
        $strings->notificationTitleImplicit = _x('We use cookies to ensure you get the best experience on our website. If you continue browsing or close this notice, you will accept their use.', 'notification', 'soscookies');
        $strings->seeDetails = _x('See details', 'notification', 'soscookies');
        $strings->seeDetailsImplicit = _x('See details', 'notification', 'soscookies');
        $strings->hideDetails = _x('Hide details', 'notification', 'soscookies');
        $strings->allowCookies = _x('Allow cookies', 'notification', 'soscookies');
        $strings->allowCookiesImplicit = _x('Close', 'notification', 'soscookies');
        $strings->savePreference = _x('Save settings', 'notification', 'soscookies');
        $strings->privacyPolicy = _x('Privacy policy', 'notification', 'soscookies');

        $strings->privacySettings = _x('Privacy settings', 'settings', 'soscookies');
        $strings->privacySettingsDialogTitleA = _x('Privacy settings', 'settings', 'soscookies');
        $strings->privacySettingsDialogTitleB = '';
        $strings->privacySettingsDialogSubtitle = _x('Some features of this website need your consent to remember who you are.', 'settings', 'soscookies');
        $strings->preferenceConsent = _x('I consent', 'settings', 'soscookies');
        $strings->preferenceDecline = _x('I decline', 'settings', 'soscookies');
        
        return $strings;
    }
    
    public static function setup() {
        load_plugin_textdomain('soscookies', FALSE, dirname(plugin_basename(dirname(__FILE__).'/../plugin.php')).'/languages/');
    }
    
    public static function enqueueStylesAndScripts() {
        $status = self::option('status');
        
        if (empty($status)) {
            return;
        }
        
        if (($status == 'testing' && current_user_can('manage_options')) || ($status == 'yes' && !is_user_logged_in())) {
            wp_enqueue_style('soscookies-cookieconsent', plugins_url('assets/cookieconsent.css', dirname(__FILE__)));
            
            wp_register_script('soscookies-cookieconsent', plugins_url('assets/cookieconsent.js', dirname(__FILE__)), array('jquery'), FALSE, TRUE);
            
            wp_enqueue_script('soscookies', plugins_url('scripts/soscookies.js', dirname(__FILE__)), array('jquery', 'soscookies-cookieconsent'), FALSE, TRUE);
            
            wp_localize_script('soscookies', 'soscookies', array(
                'cookies' => self::getPluginCookies(),
                'settings' => self::getPluginSettings(),
                'strings' => self::getPluginStrings(),
            ));
        }
    }
    
    public static function adminPages($pages) {
        	$pages[] = array(
        		'page_title' => _x('SOS Cookies', 'admin', 'soscookies'),
        		'menu_title' => _x('SOS Cookies', 'admin', 'soscookies'),
        		'capability' => 'manage_options',
            'sub_menu' => 'options-general.php',
        		'menu_slug' => 'soscookies_options',
        		'setting' => 'soscookies_options',
        	);
        	
        	return $pages;
    }
    
    public static function enableAutomaticUpdates($update, $item) {
        if (preg_match('/neuralquery-soscookies/', $item->plugin)) {
            return TRUE;
        }
        
        return $update;
    }
    
    public static function integrateWithYoastGoogleAnalytics() {
        if (class_exists('Yoast_GA_Tracking')) {
            global $wp_filter;
            
            if (array_key_exists('8', $wp_filter['wp_head'])) {
                foreach ($wp_filter['wp_head']['8'] as $entry) {
                    if (is_array($entry['function']) &&
                        $entry['function'][0] instanceof Yoast_GA_Tracking &&
                        $entry['function'][1] == 'tracking') {
        
                        self::$yoastGoogleAnalyticsInstance = $entry['function'][0];
                        
                        remove_action('wp_head', $entry['function'], 8);
                        
                        add_action('wp_head', array('soscookies', 'printYoastGoogleAnalytics'), 8);
                    }
                }
            }
        }
    }
    
    public static function printYoastGoogleAnalytics() {
        ob_start();
        
        self::$yoastGoogleAnalyticsInstance->tracking();
        
        $output = ob_get_clean();
        
        $output = str_replace(
            '<script type="text/javascript">',
            '<script type="text/plain" class="cc-onconsent-analytics">',
            $output
        );
        
        echo $output;
    }
    
}

?>