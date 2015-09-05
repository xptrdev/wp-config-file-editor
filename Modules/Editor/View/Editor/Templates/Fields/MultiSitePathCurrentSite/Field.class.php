<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSitePathCurrentSite;

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
		return 'Root path';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Root path for multi site installations';
	}

}
