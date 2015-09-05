<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbCharSet extends Constant {  

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Database Charset to use in creating database tables.'
	);
	
	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DB_CHARSET';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

