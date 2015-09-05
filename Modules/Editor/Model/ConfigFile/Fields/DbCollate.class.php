<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbCollate extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'The Database Collate type. Don\'t change this if in doubt.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DB_COLLATE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

