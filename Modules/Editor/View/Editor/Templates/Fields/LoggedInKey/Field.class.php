<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\LoggedInKey;

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
		return 'Logged In key';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Wordpress Hash key for LOGGED_IN_KEY constant';
	}

}
