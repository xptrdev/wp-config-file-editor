<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteToolPluginLoader {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Load WCFE Plugin for Multi Sites Setup Tools'
	);

	/**
	* put your comment there...
	* 
	*/
	public function & allReady()
	{
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function __toString()
	{
		
		ob_start();
		
		require 'MultiSiteToolPluginLoader.configcode.php';
		
		return ob_get_clean();
		
	}

}

