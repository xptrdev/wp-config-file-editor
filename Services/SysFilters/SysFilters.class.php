<?php
/**
* 
*/

namespace WCFE\Services\SysFilters;

/**
* 
*/
class SysFilters  
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
	*/
	private function __construct() {}

	/**
	* put your comment there...
	* 
	*/
	public function _sysFilters()
	{
		
	}

	/**
	* put your comment there...
	* 
	*/
	protected function hook()
	{
		add_action( \WCFE\Hooks::ACTION_PLUGIN_LOADED, array( $this, '_sysFilters' ) );
	}
	
	/**
	* put your comment there...
	* 	
	*/
	public static function & run()
	{
		
		if ( ! self::$instance )
		{
			self::$instance = new SysFilters();
			
			self::$instance->hook();
		}
		
		return self::$instance;
	}

}