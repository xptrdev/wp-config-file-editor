<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbName extends Constant {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $comments = array
	(
		'The name of the database for WordPress'
	);
	
	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DB_NAME';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

