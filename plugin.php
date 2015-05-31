<?php

/*
Plugin Name: SOS Cookies
Plugin URI: http://github.com/neuralquery/soscookies
Description: SOS Cookies
Version: 1.0
Author: Daniel Rampanelli
Author URI: http://danielrampanelli.com
Text Domain: soscookies
Plugin Type: Piklist
License: GPL, Version 3
*/

require_once(__DIR__.'/includes/soscookies.php');
require_once(__DIR__.'/includes/shortcodes.php');
require_once(__DIR__.'/includes/services.php');

add_action('after_setup_theme', function() {
    load_plugin_textdomain('soscookies', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
});

add_action('wp_enqueue_scripts', array('soscookies', 'enqueueStylesAndScripts'));

add_action('plugins_loaded', array('soscookies', 'integrateWithYoastGoogleAnalytics'));

add_filter('piklist_admin_pages', array('soscookies', 'adminPages'));

add_shortcode('soscookies-policy-disclosure', array('soscookies_shortcodes', 'policyDisclosure'));

add_shortcode('soscookies-policy-services', array('soscookies_shortcodes', 'policyServices'));

?>