<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbAllowRepair extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'automatic database optimization support.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_ALLOW_REPAIR';

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

