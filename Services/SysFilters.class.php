<?php
/**
* 
*/

namespace WCFE\Services;

# Module Framework
use WPPFW\Services\ServiceModule;

# Wordpres Plugin Framework
use WPPFW\Plugin\PluginBase;

# Wordpress Services Framework
use WPPFW\Services\Dashboard\Menu\MenuService;
use WPPFW\Services\Dashboard\Ajax\AjaxService;

/**
* 
*/
class SysFiltersModule extends ServiceModule {
	
	/**
	* 
	*/
	const SERVICE_KEY = 3;

	/**
	* 
	*/
	const SERVICE_OBJECT_KEY = 0;
	
	/**
	* 
	*/
	const AJAX_SERVICE_KEY = 4;
	
	/**
	* 
	*/
	const AJAX_SERVICE_OBJECT_KEY = 0;
	
	/**
	* 
	*/
	const AJAX_VIEWS_SERVICE_OBJECT_KEY = 1;

	/**
	* put your comment there...
	* 
	* @param PluginBase $plugin
	* @param mixed $services
	*/
	protected function initializeServices(PluginBase & $plugin, & $services) 
	{
		
		# Editor Form Dashboard page
		$services[ self::SERVICE_KEY ] = new MenuService
		(
			$plugin, array
			(
				self::SERVICE_OBJECT_KEY => new SysFilters\Dashboard\Page()
			)
		);
		
		# Add Network Dashboard menu in MULTISITES installation
		# or add administrator menu page in normal installation
		if ( is_multisite() ) 
		{
			$services[ self::SERVICE_KEY ]->setHook( 'network_admin_menu' );
		}
		
		# Ajax endpoint
		$services[ self::AJAX_SERVICE_KEY ] = new AjaxService
		(
			$plugin,
			array
			(
				self::AJAX_SERVICE_OBJECT_KEY => new SysFilters\Services\Dashboard\Ajax(),
				self::AJAX_VIEWS_SERVICE_OBJECT_KEY => new SysFilters\Services\Dashboard\AjaxViews()
			)
		);
				
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function dashboard() {
		return $this->getServiceObject( self::SERVICE_KEY, self::SERVICE_OBJECT_KEY );
	}

	/**
	* put your comment there...
	* 
	*/
	public function dashboardService() 
	{
		return $this->getServiceObject( self::AJAX_SERVICE_KEY, self::AJAX_SERVICE_OBJECT_KEY );
	}

	/**
	* put your comment there...
	* 
	*/
	public function dashboardServiceViews()
	{
		return $this->getServiceObject( self::AJAX_SERVICE_KEY, self::AJAX_VIEWS_SERVICE_OBJECT_KEY );
	}

}
