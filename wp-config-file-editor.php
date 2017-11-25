<?php
/**
* Plugin Name: WP Config File Editor
* Plugin URI: http://www.cbspoint.com/plugins/wp-config-file-editor/
* Text Domain: wp-config-file-editor 
* Domain Path: /Languages
* Author: AHMeD SAiD
* Author URI: http://www.cbspoint.com/
* Version: 1.6.7
* Description: Modify Wordpress wp-config.php file values using a Simple User Interface Form, In additional is can be used to change wide system parameters
* License: GPL2
*/

/**
* 
*/
final class WCFEPluginLoaded
{
    
    const REQ_PHP_VERSION = '5.3.0';
    
    const TEXT_DOMAIN = 'wp-config-file-editor';
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $checkException;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private static $instance;
    
    /**
    * put your comment there...
    * 
    */
    public function _OnIncompatibleEnvironment()
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'Loader' . 
                DIRECTORY_SEPARATOR . 'IncompatibleEnvoirnment.html.php';
    }
    
    /**
    * put your comment there...
    * 
    */
    private function checkPHPVerion()
    {
        
        // Run If Version is compatible
        if (version_compare(self::REQ_PHP_VERSION, PHP_VERSION) == 1)
        {                    
            throw new \Exception(sprintf(__('WP Config File Editor Plugin required at least PHP Version %s to function propaly. Current PHP Version is %s. Please upgrade PHP Version.'), WCFEPluginLoaded::REQ_PHP_VERSION, PHP_VERSION));
        }

    }
    
    /**
    * put your comment there...
    * 
    */
    public static function load()
    {
        
        if (!self::$instance)
        {
            
            self::$instance = new WCFEPluginLoaded();
            
            try
            {
                
                // Check all requirements
                self::$instance->checkPHPVerion();
                
                // Plug if all check passed
                require __DIR__ . DIRECTORY_SEPARATOR . 'Plugin.php';
                
                \WCFE\Plugin::plug(__FILE__);
                
            }
            catch (Exception $exception)
            {
                
                self::$instance->checkException = $exception;
                
                // Show admin notice if any check failed
                load_plugin_textdomain(self::TEXT_DOMAIN);
                
                // Show Admin notice with message
                add_action('admin_notices', array(self::$instance, '_OnIncompatibleEnvironment'));
                add_action('admin_network_notices', array(self::$instance, '_OnIncompatibleEnvironment'));
            }
        }
        
        return;
    }
}

WCFEPluginLoaded::load();


