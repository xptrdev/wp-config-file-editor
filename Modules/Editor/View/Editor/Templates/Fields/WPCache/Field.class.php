<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\WPCache;

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
		return 'Enable Cache';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'If true, includes the wp-content/advanced-cache.php script, when executing wp-settings.php.';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
