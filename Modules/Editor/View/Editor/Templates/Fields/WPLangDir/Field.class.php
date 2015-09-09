<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\WPLangDir;

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
		return 'Language Directory';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Defines what directory the Language .mo file resides. If Language Directory is not defined WordPress looks first to wp-content/languages and then wp-includes/languages for the .mo defined by Language file.';
	}

}
