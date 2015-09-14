<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class ConcatenateJavaScript extends Constant {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Enable/ Disable JavaScript Concatenation'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'CONCATENATE_SCRIPTS';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}
