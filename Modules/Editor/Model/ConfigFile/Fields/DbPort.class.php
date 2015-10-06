<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbPort extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Database connection port'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DB_HOST';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutputForce = true;
	
	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

