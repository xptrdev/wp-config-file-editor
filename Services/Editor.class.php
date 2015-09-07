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
class EditorModule extends ServiceModule {
	
	/**
	* 
	*/
	const EDITOR_SERVICE_KEY = 0;

	/**
	* 
	*/
	const EDITOR_SERVICE_OBJECT_KEY = 0;
	
	/**
	* 
	*/
	const EDITOR_AJAX_SERVICE_KEY = 1;
	
	/**
	* 
	*/
	const EDITOR_AJAX_SERVICE_OBJECT_KEY = 0;

	/**
	* put your comment there...
	* 
	* @param PluginBase $plugin
	* @param mixed $services
	*/
	protected function initializeServices(PluginBase & $plugin, & $services) {
		# Viewer page service
		$services[self::EDITOR_SERVICE_KEY] = new MenuService($plugin, array(
			self::EDITOR_SERVICE_OBJECT_KEY => new Editor\MenuPages\Editor\Page()
		));
		$services[self::EDITOR_AJAX_SERVICE_KEY] = new AjaxService($plugin, array(
			self::EDITOR_AJAX_SERVICE_OBJECT_KEY => new Editor\Services\Editor\Ajax()
		));
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function editor() {
		return $this->getServiceObject(self::EDITOR_SERVICE_KEY, self::EDITOR_SERVICE_OBJECT_KEY);
	}

	/**
	* put your comment there...
	* 
	*/
	public function editorService() 
	{
		return $this->getServiceObject( self::EDITOR_AJAX_SERVICE_KEY, self::EDITOR_AJAX_SERVICE_OBJECT_KEY );
	}

}
