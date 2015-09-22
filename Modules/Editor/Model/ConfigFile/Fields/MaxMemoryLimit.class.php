<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MaxMemoryLimit extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Max Memory Limit'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_MAX_MEMORY_LIMIT';

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
		return new Types\StringType();
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{ 
		return '256M';
	}
	
}

