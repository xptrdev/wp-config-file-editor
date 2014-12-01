<?php
/**
* Plugin Name: WP Config File Editor
* Plugin URI: http://wp-cfe.xptrdev.com
* Author: AHMeD SAiD
* Author URI: http://xptrdev.com
* Version: 0.5
* Description: Provide a simple user interface for editing Wordpress values
* License: GPL2
*/

# WCFE Namespace
namespace WCFE;

# Autoloads
require 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

# Constants
const NO_DIRECT_ACCESS_MESSAGE = 'Access Denied';

# Wordpres Plugin Framework
use WPPFW\Plugin\PluginBase;

# Editor Service Module
use WCFE\Services\EditorModule;

/**
* 
* @author AHMeD SAiD 
*/
class Plugin extends PluginBase {
	
	/**
	* Holds ARV Plugin instance
	* 
	* @var Plugin
	*/
	protected static $instance;
	
	/**
	* Bootstrap ARV Plugin
	* 
	* return void
	*/
	protected function __construct() {
		# Plugin base
		parent::__construct(__FILE__, new Config\Plugin());
		# Only admin side is used in this Plugin
		if (is_admin()) {
			# Editor Service Module
			$editorModule = new EditorModule($this);
			$editorModule->start();
		}		
	}

	/**
	* Run ARV Plugin if not alreayd running
	* 
	* This methos is to construct a new ARV\Plugin instance if not already
	* instantiated.
	* 
	* @return PLugin
	*/
	public static function run() {
		# Create if not yet created
		if (!self::$instance) {
			self::$instance = new Plugin();
		}
		# Return instance
		return self::$instance;
	}

}

# Run The Plugin
Plugin::run();

