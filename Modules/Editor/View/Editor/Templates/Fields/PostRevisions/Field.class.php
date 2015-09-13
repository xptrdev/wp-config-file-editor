<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\PostRevisions;

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
		return 'Enable Revisions';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Enable / Disable post revisions';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
