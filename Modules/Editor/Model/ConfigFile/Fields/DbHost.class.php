<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbHost extends Constant {

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DB_HOST';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

