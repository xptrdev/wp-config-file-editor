<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\SecureAuthSalt;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\SecureKeyField;

/**
* 
*/
class Field extends SecureKeyField {

	/**
	* put your comment there...
	* 
	*/
	protected function getText() {
		return 'Secure Authentication Salt';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Wordpress Hash key for SECURE_AUTH_SALT constant';
	}

}
