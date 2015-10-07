<?php
/**
* WordpressOptions.class.php
*/

# Define namespace
namespace WCFE\Installer;

# Imports
use WPPFW\Obj;

# Original object
use WPPFW\Database\Wordpress;

/**
* Factoring Wordpress Database Options Table
* 
* @author AHMeD SAiD 
*/
class WordpressOptions {

	/**
	* Creating new WPPFW\Database\Wordpress\WordpressOptions object
	* configued for WCFE Plugin
	* 
	* @param Obj\Factory $factory
	* @return Wordpress\WordpressOptions
	*/
	public function getInstance( Obj\Factory & $factory ) 
	{
		
		$plugin =& \WCFE\Plugin::me();
		
		$prefix = strtolower( $plugin->getNamespace()->getNamespace() . '-' );
		
		$wpOptionsObj = is_multisite() ?
										new Wordpress\MUWordpressOptions( $prefix, get_main_network_id() ) :
										new Wordpress\WordpressOptions( $prefix );
		
		return $wpOptionsObj;
	}

}
