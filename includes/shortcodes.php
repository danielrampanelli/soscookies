<?php
    
class soscookies_shortcodes {
    
    private static function getTemplate($name) {
        $file = sprintf('%s/../parts/%s.php', __DIR__, $name);
        
        if (defined('ICL_LANGUAGE_CODE')) {
            $localizedFile = sprintf('%s/../parts/%s-%s.php', __DIR__, $name, ICL_LANGUAGE_CODE);
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
        $name = '(NAME)';
        $address = '(ADDRESS)';
        $services = array();
        
        if (!empty($attributes['name'])) {
            $name = $attributes['name'];
        }
        
        if (!empty($attributes['address'])) {
            $address = $attributes['address'];
        }
        
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