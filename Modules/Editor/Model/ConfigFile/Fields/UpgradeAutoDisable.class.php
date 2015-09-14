<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class UpgradeAutoDisable extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Disable all automatic updates'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'AUTOMATIC_UPDATER_DISABLED';

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

