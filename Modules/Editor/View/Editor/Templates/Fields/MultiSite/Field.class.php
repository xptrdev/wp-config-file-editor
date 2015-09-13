<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSite;

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
		return 'Enable Multi Site';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Multi site feature is enabled on current Wordpress installation';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
