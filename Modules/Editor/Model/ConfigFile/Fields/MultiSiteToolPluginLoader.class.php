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
		
		return "\n\ninclude_once WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'wp-config-file-editor' . DIRECTORY_SEPARATOR . 'wp-config-file-editor.php';\n\n";
		
	}

}

