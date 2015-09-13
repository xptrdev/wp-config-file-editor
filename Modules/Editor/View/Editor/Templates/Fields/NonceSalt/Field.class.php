<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\NonceSalt;

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
	public function getText() {
		return 'Nonce salt';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Wordpress Hash key for NONCE_SALT constant';
	}

}
