<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class UpgradeDisablePluggables extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'his will block users being able to use the plugin and theme installation/update functionality from the WordPress admin area. Setting this constant also disables the Plugin and Theme editor (i.e. you don\'t need to set DISALLOW_FILE_MODS and DISALLOW_FILE_EDIT, as on its own DISALLOW_FILE_MODS will have the same effect).'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DISALLOW_FILE_MODS';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

