<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityDisablePluggablesEditor extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Disable Plugins and Themes file editor.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DISALLOW_FILE_EDIT';

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
		return new Types\BooleanType();
	}

}

