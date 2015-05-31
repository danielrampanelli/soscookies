<?php

class soscookies {
    
    public static function enqueueStylesAndScripts() {
        wp_enqueue_style('soscookies-cookieconsent', plugins_url('assets/cookieconsent.css', __DIR__));
        
        wp_register_script('soscookies-cookieconsent', plugins_url('assets/cookieconsent.js', __DIR__), array('jquery'), FALSE, TRUE);
        
        wp_enqueue_script('soscookies', plugins_url('scripts/soscookies.js', __DIR__), array('jquery', 'soscookies-cookieconsent'), FALSE, TRUE);
        
        wp_localize_script('soscookies', 'soscookies', array(
            'options' => (object) array(
                'cookies' => (object) array(
                    'analytics' => (object) array(),
                    'social' => (object) array(),
                ),
                'settings' => (object) array(
                    'consenttype' => 'explicit',
                    'clickAnyLinkToConsent' => TRUE,
                    'disableallsites' => TRUE,
                ),
            ),
        ));
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