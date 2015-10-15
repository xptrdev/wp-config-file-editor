<?php
/**
* 
*/

namespace WCFE\SysPlugins\SysFilters;

/**
* 
*/
class Plugin
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $data;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $modules;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct()
	{
		
		# Load site data if not in multi site or load primary
		# site data for multi site (configuration will be applied or all sites)
		
		$optionName = 'wcfe-model-state_sysfiltersdashboardmodel';
		
		$this->data = is_multisite() ? get_blog_option( get_main_network_id(), $optionName ) : get_option( $optionName );

	}
	
	/**
	* put your comment there...
	* 
	*/
	public function run()
	{
		
		// System Parameters page never saved/configured!
		// Get out until admin configue it from Dashboard page
		if ( ! $this->data )
		{
			return;
		}
		
		// No reason for this, however no chance for errors
		// in Sys Plugins that is always RUNS!!!
		if ( ! isset( $this->data[ 'sysFiltersData' ] ) || ! is_array( $this->data[ 'sysFiltersData' ] ) )
		{
			
			return;
		}
		
		$this->data = $this->data[ 'sysFiltersData' ];
		
		# Load modules
		$this->modules[ 'misc' ] = new Modules\MiscModule();
		$this->modules[ 'http' ] = new Modules\HTTPModule();
		$this->modules[ 'editor' ] = new Modules\EditorModule();
		$this->modules[ 'kses' ] = new Modules\KsesModule();
		
		foreach ( $this->modules as $name => $module )
		{
			$module->run( isset( $this->data[ $name ] ) ? $this->data[ $name ] : null );
		}
		
		return;
	}
	
}