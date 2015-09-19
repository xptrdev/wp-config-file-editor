<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\CookieSitePath;

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
	public function getText() {
		return 'Site Path';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Site path cookie';
	}

}
