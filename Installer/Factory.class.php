<?php
/**
* 
*/

namespace WCFE\Installer;

/**
* 
*/
class Factory extends \WPPFW\Plugin\PluginFactory 
{
	
	/**
	* put your comment there...
	* 
	*/
	protected function createMap()
	{
		$this->addClassMap( 'WPPFW\Database\Wordpress\WordpressOptions', 'WordpressOptions' );
	}
	
}