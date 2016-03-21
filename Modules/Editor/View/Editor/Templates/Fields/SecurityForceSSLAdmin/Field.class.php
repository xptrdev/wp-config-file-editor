<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\SecurityForceSSLAdmin;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\CheckboxField;

/**
* 
*/
class Field extends CheckboxField {

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->_( 'Force SSL Admin' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option.' );
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
