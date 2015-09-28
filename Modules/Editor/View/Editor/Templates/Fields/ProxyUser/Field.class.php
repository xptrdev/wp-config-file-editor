<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\ProxyUser;

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
		return 'User';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Proxy username, if it requires authentication';
	}

}