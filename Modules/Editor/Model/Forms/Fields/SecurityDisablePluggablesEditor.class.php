<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields;

# Field base
use WPPFW\Forms;

/**
* 
*/
class SecurityDisablePluggablesEditor extends Forms\Fields\FormIntegerField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('SecurityDisablePluggablesEditor');
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'DISALLOW_FILE_EDIT' ) ? DISALLOW_FILE_EDIT : null );
	}

}

