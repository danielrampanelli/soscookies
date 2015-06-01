<?php
    
class soscookies_shortcodes {
    
    private static function getTemplate($name) {
        $file = sprintf('%s/../parts/%s.php', dirname(__FILE__), $name);
        
        $language = soscookies::option('language');
        if (empty($language) && defined('ICL_LANGUAGE_CODE')) {
            $language = ICL_LANGUAGE_CODE;
        }
        
        if (!empty($language)) {
            $localizedFile = sprintf('%s/../parts/%s-%s.php', dirname(__FILE__), $name, $language);
            if (file_exists($localizedFile)) {
                $file = $localizedFile;
            }
        }
        
        return $file;
    }
    
    private static function getServices($value) {
        $allServices = soscookies_services::get();
        
        $services = array();
        
        $ids = explode(',', $value);
        foreach ($ids as $id) {
            if (array_key_exists($id, $allServices)) {
                $services[] = $allServices[$id];
            }
        }
        
        return $services;
    }
    
    public static function policyDisclosure($attributes, $content = '') {
        $name = soscookies::option('name', '[NAME]');
        $address = soscookies::option('address', '[ADDRESS]');
        $services = array();
        
        if (!empty($attributes['services'])) {
            $services = self::getServices($attributes['services']);
        }
        
        ob_start();
        include(self::getTemplate('policy/disclosure'));
        return ob_get_clean();
    }
    
    public static function policyServices($attributes, $content = '') {
        $services = array();
        
        if (!empty($attributes['services'])) {
            $services = self::getServices($attributes['services']);
        }
        
        ob_start();
        include(self::getTemplate('policy/services'));
        return ob_get_clean();
    }
    
}
    
?>