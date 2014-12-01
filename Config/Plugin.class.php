<?php
/**
* Plugin.class.php
* @author AHMeD SAiD
*/

# Define namespace
namespace WCFE\Config;

# Imports
use WPPFW\Plugin\PluginConfig;

/**
* Plugin configuration class
* 
* @author AHMeD SAiD
*/
class Plugin extends PluginConfig {
	
	/**
	* Load Plugin configuration from configuration XML file
	* 
	* @return void
	*/
	public function __construct() {
		# Load plugin.xml file relative to this class
		parent::__construct(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'plugin.xml'));
	}
	
}