<?php

/*
Setting: soscookies_options
Tab: Export
Tab Order: 30
*/

$preStyles = array(
    'background: white',
    'box-sizing: border-box',
    'border: 1px solid #cccccc',
    'overflow-x: auto',
    'padding: 20px',
    'width: 100%',
);

$pluginConfiguration = soscookies::getPluginConfiguration();
if (defined('JSON_PRETTY_PRINT')) {
    $pluginConfiguration = json_encode($pluginConfiguration, JSON_PRETTY_PRINT);
} else {
    $pluginConfiguration = json_encode($pluginConfiguration);
}

?>

<h2>Client-side code</h2>
<pre style="<?php echo implode(';', $preStyles) ?>">
;(function($) {

cc.initialise(<?php echo $pluginConfiguration ?>);
    
$(document).on('click', '.triggers-cookies-preferences', function(e) {
    e.preventDefault();
    
    if (!!window['cc']) {
        cc.showmodal();
    }
    
    return false;
});
    
})(jQuery);
</pre>

<h2>Policy</h2>
<pre style="<?php echo implode(';', $preStyles) ?>">
<?php echo htmlentities(soscookies_shortcodes::policyDisclosure()) ?>
</pre>