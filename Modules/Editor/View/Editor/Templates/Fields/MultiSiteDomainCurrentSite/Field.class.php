<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSiteDomainCurrentSite;

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
		return 'Domain';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Root domain for multi site installations';
	}

}
