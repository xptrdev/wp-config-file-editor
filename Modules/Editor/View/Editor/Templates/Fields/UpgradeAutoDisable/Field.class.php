<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeAutoDisable;

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
		return 'Disable Automatic Update';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Disable all automatic updates';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
