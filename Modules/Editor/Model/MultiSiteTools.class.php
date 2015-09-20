<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class MultiSiteToolsModel extends PluginModel 
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $activePlugins = array();
	
	/**
	* put your comment there...
	* 
	*/
	public function _initialize()
	{
		
	}
	
	
	/**
	* put your comment there...
	* 
	*/
	public function getActivePlugins()
	{
		
		# Store active plugins
		$this->activePlugins = wp_get_active_and_valid_plugins();
		
		return $this->activePlugins;
		
	}
}