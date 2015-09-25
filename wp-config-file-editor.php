<?php
/**
* Plugin Name: WP Config File Editor
* Plugin URI: http://wp-cfe.xptrdev.com
* Author: AHMeD SAiD
* Author URI: http://xptrdev.com
* Version: 1.3
* Description: Modify Wordpress wp-config.php file values using a Simple User Interface Form
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

# Modules
use WCFE\Services;

/**
* 
* @author AHMeD SAiD 
*/
class Plugin extends PluginBase 
{
	
	/**
	* 
	*/
	const DIR = __DIR__;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $bindingHooks;
	
	/**
	* Holds ARV Plugin instance
	* 
	* @var Plugin
	*/
	private static $instance;
	
	/**
	* Bootstrap ARV Plugin
	* 
	* return void
	*/
	protected function __construct() 
	{
		# Plugin base
		parent::__construct( __FILE__, new Config\Plugin() );
		
		# Only admin side is used in this Plugin
		if ( is_admin() ) 
		{
			
			# Editor Service Module
			$editorModule = new Services\EditorModule( $this );
			$editorModule->start();
			
			$profilesModule = new Services\ProfilesModule( $this );
			
			# Profiles is totally relying on AJAX
			# editor Ajax should be here too however I will do that
			# in the subsequence releases
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
			{
				$profilesModule->start();
			}
			
			$this->bindingHooks = true;
			
		}

		# Start using hooks at this point so that WCFE Extensions can get involved
		add_action( 'plugins_loaded', array( $this, '_initializePluggableHooks' ) );
	}

	/**
	* put your comment there...
	* 
	*/
	public function _initializePluggableHooks()
	{
		
		////////////////////////////////////#$
		
		do_action( Hooks::ACTION_PLUGIN_LOADED, $this );
		
		////////////////////////////////////#$
		
		
		////////////////////////////////////#$
		
		if ( $this->bindingHooks ) 
		{
			do_action( Hooks::ACTION_PLUGIN_BINDING_HOOKS, $this );	
		}
		
		////////////////////////////////////#$	
	}
	
	/**
	* put your comment there...
	* 
	*/
	public static function & me()
	{
		return self::$instance;
	}
	
	/**
	* Run ARV Plugin if not alreayd running
	* 
	* This methos is to construct a new ARV\Plugin instance if not already
	* instantiated.
	* 
	* @return PLugin
	*/
	public static function run()
	{
		# Create if not yet created
		if ( ! self::$instance )
		{
			self::$instance = new Plugin();
		}
		
		# Return instance
		return self::$instance;
		
	}

}

# Run The Plugin
Plugin::run();

