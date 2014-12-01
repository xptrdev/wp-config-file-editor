<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\WPDebug;

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
	protected function getText() {
		return 'Debug Mode';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Set Debugging mode to one causes PHP and Wordpress to display errors used for debugging Wordpress while development';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
