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
use WPPFW\Services\Dashboard\Ajax\AjaxService;

/**
* 
*/
class ProfilesModule extends ServiceModule {
	
	/**
	* 
	*/
	const PROFILES_AJAX_SERVICE_KEY = 2;

	/**
	* 
	*/
	const PROFILES_AJAX_VIEW_SERVICE_OBJECT_KEY = 0;
	
	/**
	* 
	*/
	const PROFILES_AJAX_SERVICE_OBJECT_KEY = 1;

	/**
	* put your comment there...
	* 
	* @param PluginBase $plugin
	* @param mixed $services
	*/
	protected function initializeServices(PluginBase & $plugin, & $services) 
	{
		
		
		$services[ self::PROFILES_AJAX_SERVICE_KEY ] = new AjaxService
		(
			$plugin,
			array
			(
				self::PROFILES_AJAX_VIEW_SERVICE_OBJECT_KEY => new Profiles\Services\Profiles\AjaxView(),
				self::PROFILES_AJAX_SERVICE_OBJECT_KEY => new Profiles\Services\Profiles\Ajax()
			)
		);
		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function profilesView() {
		return $this->getServiceObject( self::PROFILES_AJAX_SERVICE_KEY, self::PROFILES_AJAX_VIEW_SERVICE_OBJECT_KEY );
	}

	/**
	* put your comment there...
	* 
	*/
	public function profilesService() 
	{
		return $this->getServiceObject( self::PROFILES_AJAX_SERVICE_KEY, self::PROFILES_AJAX_SERVICE_OBJECT_KEY );
	}

}
