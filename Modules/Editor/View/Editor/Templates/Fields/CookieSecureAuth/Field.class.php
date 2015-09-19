<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\CookieSecureAuth;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\InputField;

/**
* 
*/
class Field extends InputField {

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return 'Secure Auth';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Secure Auth cookie';
	}

}
