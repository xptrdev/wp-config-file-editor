<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CookiePluginsPath extends Constant {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Plugins path cookie'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'PLUGINS_COOKIE_PATH';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{
		return preg_replace( '|https?://[^/]+|i', '', WP_PLUGIN_URL );
	}
	
}

