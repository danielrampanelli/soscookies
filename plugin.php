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

add_action('wp_enqueue_scripts', array('soscookies', 'enqueueStylesAndScripts'));

?>