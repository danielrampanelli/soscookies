<?php

/*
Plugin Name: SOS Cookies
Plugin URI: http://github.com/neuralquery/soscookies
Description: SOS Cookies
Version: 1.0.1
Author: Daniel Rampanelli
Author URI: http://danielrampanelli.com
Text Domain: soscookies
Plugin Type: Piklist
License: GPL, Version 3
*/

require_once(dirname(__FILE__).'/includes/soscookies.php');
require_once(dirname(__FILE__).'/includes/shortcodes.php');
require_once(dirname(__FILE__).'/includes/services.php');
require_once(dirname(__FILE__).'/libs/plugin-update-checker/plugin-update-checker.php');

PucFactory::buildUpdateChecker('http://neuralquery.com/wordpress/updates/?action=get_metadata&slug=neuralquery-soscookies', __FILE__);

add_action('after_setup_theme', array('soscookies', 'setup'));

add_action('wp_enqueue_scripts', array('soscookies', 'enqueueStylesAndScripts'));

add_action('plugins_loaded', array('soscookies', 'integrateWithYoastGoogleAnalytics'));

add_filter('piklist_admin_pages', array('soscookies', 'adminPages'));

add_filter('auto_update_plugin', array('soscookies', 'enableAutomaticUpdates'), 10, 2);

add_shortcode('soscookies-policy-disclosure', array('soscookies_shortcodes', 'policyDisclosure'));

add_shortcode('soscookies-policy-services', array('soscookies_shortcodes', 'policyServices'));

?>