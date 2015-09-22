<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class UpgradeFSMethod extends Constant {

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
		'forces the filesystem method'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'FS_METHOD';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

