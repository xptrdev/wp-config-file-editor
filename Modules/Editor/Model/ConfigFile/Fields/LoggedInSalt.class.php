<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class LoggedInSalt extends Constant {

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'LOGGED_IN_SALT';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

