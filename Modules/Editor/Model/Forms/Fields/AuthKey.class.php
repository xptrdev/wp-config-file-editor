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
class AuthKey extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
    {
		# Set field name and rules
		parent::__construct( 'AuthKey', array( new \WPPFW\Forms\Rules\RequiredField() ) );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'AUTH_KEY' ) ? AUTH_KEY : null );
	}

}

