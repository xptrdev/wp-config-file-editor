<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSiteAllow;

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
		return 'Setup Multi Site installation';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Show Tools->Network Setup page from which you can configure Multi Site installation';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
