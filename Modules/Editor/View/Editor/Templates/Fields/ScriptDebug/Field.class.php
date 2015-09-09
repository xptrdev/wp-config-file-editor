<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\ScriptDebug;

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
		return 'Script Debugging';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'If you are planning on modifying some of WordPress built-in JavaScript or Cascading Style Sheets:';
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
