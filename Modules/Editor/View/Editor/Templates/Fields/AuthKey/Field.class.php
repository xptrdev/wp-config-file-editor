<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\AuthKey;

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
		return 'Authentication';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Wordpress Hash key for AUTH_KEY constant';
	}

}
