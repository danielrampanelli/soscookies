<?php

class soscookies {
    
    public static function enqueueStylesAndScripts() {
        wp_enqueue_style('soscookies-cookieconsent', plugins_url('assets/cookieconsent.min.css', __DIR__));
        
        wp_register_script('soscookies-cookieconsent', plugins_url('assets/cookieconsent.min.js', __DIR__), array('jquery'), FALSE, TRUE);
        
        wp_enqueue_script('soscookies', plugins_url('scripts/soscookies.js', __DIR__), array('jquery', 'soscookies-cookieconsent'), FALSE, TRUE);
        
        wp_localize_script('soscookies', 'soscookies', array(
            'options' => (object) array(
                'cookies' => (object) array(
                    'analytics' => (object) array(),
                    'social' => (object) array(),
                ),
                'settings' => (object) array(
                    'consenttype' => 'explicit',
                    'disableallsites' => TRUE,
                ),
            ),
        ));
    }
    
}

?>