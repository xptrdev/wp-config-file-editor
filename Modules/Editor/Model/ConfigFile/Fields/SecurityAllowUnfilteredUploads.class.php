<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityAllowUnfilteredUploads extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		''
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'ALLOW_UNFILTERED_UPLOADS';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

