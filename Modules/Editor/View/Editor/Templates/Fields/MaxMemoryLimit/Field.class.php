<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MaxMemoryLimit;

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
		return 'Max Memory limit';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Max memory Limits';
	}

}
