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
class SecureAuthKey extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('SecureAuthKey', array(new Forms\Rules\RequiredField()));
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue(SECURE_AUTH_KEY);
	}

}

