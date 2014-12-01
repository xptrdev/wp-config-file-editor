<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbUser;

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
	protected function getText() {
		return 'User Name';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'User name to be used for connecting to Database';
	}

}
