<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MultiSiteSiteId;

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
		return 'Site Id';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Current Site Id';
	}

}
