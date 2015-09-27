<?php
/**
*
*  
*/

namespace WCFE\SysPlugins;

/**
* 
*/
class Plugins 
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $instance;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $plugins;
	
	/**
	* put your comment there...
	* 
	*/
	private function __construct()
	{
		# Load Plugins
		$this->plugins[ ] = new SysFilters\Plugin();
	}

	/**
	* put your comment there...
	* 
	*/
	public static function & load()
	{
		
		if ( ! self::$instance )
		{
			self::$instance = new Plugins();
		}
		
		return self::$instance;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function runPlugins()
	{
		
		foreach ( $this->plugins as $plugin )
		{
			$plugin->run();
		}
		
		return $this;
	}

}