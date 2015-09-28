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
	protected $modules;
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct()
	{
		
		# Load data
		$this->data = get_option( 'wcfe-model-state_sysfiltersdashboardmodel' );
		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function run()
	{
		
		// System Parameters page never saved/configured!
		// Get out
		if ( ! $this->data )
		{
			return;
		}
		
		// No reason for this, however no chance for errors
		// in Sys Plugins that is always RUNS!!!
		if ( ! isset( $this->data[ 'sysFiltersData' ] ) )
		{
			
			return;
		}
		
		$this->data = $this->data[ 'sysFiltersData' ];
		
		# Load modules
		
		$this->modules[ 'http' ] = new Modules\HTTPModule();
		
		foreach ( $this->modules as $name => $module )
		{
			$module->run( isset( $this->data[ $name ] ) ? $this->data[ $name ] : null );
		}
		
		return;
	}
	
}