<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class AuthKey extends Constant {

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'AUTH_KEY';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

