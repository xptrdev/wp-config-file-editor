<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class ScriptDebug extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'For developers: WordPress Script Debugging
		
		 Force Wordpress to use unminified JavaScript files'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'SCRIPT_DEBUG';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

