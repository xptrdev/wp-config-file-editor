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
class NonceKey extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('NonceKey', array(new Forms\Rules\RequiredField()));
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue(NONCE_KEY);
	}

}

