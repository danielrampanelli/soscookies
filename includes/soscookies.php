<?php

class soscookies {
    
    public static function option($name, $default = NULL) {
        $settings = get_option('soscookies_options');
        
        $value = $default;
        if (!empty($settings) && array_key_exists($name, $settings)) {
            $value = $settings[$name];
        }
        
        return $value;
    }
    
    private static function getPluginOptions() {
        $options = (object) array(
            'cookies' => (object) array(),
            'settings' => (object) array(
                'consenttype' => self::option('consent_type', 'explicit'),
                'clickAnyLinkToConsent' => TRUE,
                'disableallsites' => TRUE,
                'tagPosition' => FALSE,
            ),
        );
        
        $types = (array) self::option('cookie_types', array());
        foreach ($types as $type) {
            $options->cookies->{$type} = (object) array();
        }
        
        $refresh = self::option('refresh_on_consent');
        $options->settings->refreshOnConsent = !empty($refresh);
        
        $options->settings->style = self::option('theme', 'dark');
        
        $options->settings->bannerPosition = self::option('banner', 'top');
        
        $tag = self::option('tag');
        if (!empty($tag)) {
            $options->settings->tagPosition = $tag;
        }
        
        return $options;
    }
    
    public static function enqueueStylesAndScripts() {
        $status = self::option('status');
        
        if (empty($status)) {
            return;
        }
        
        if (($status == 'testing' && current_user_can('manage_options')) || ($status == 'yes' && !is_user_logged_in())) {
            wp_enqueue_style('soscookies-cookieconsent', plugins_url('assets/cookieconsent.css', __DIR__));
            
            wp_register_script('soscookies-cookieconsent', plugins_url('assets/cookieconsent.js', __DIR__), array('jquery'), FALSE, TRUE);
            
            wp_enqueue_script('soscookies', plugins_url('scripts/soscookies.js', __DIR__), array('jquery', 'soscookies-cookieconsent'), FALSE, TRUE);
            
            wp_localize_script('soscookies', 'soscookies', array(
                'options' => self::getPluginOptions()
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
    
}

?>