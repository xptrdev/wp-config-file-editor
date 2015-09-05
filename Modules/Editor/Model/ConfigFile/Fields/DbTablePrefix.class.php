<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbTablePrefix extends Variable {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'WordPress Database Table prefix.
		
 		 You can have multiple installations in one database if you give each a unique
 		 prefix. Only numbers, letters, and underscores please!'
 		 
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'table_prefix';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

