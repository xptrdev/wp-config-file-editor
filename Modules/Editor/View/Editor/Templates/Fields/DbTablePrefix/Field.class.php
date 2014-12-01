<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbTablePrefix;

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
		return 'Table Prefix';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Use a unique identifier to be used at the begining of each Database table name. Using this its possible to install multiple application under one database';
	}

}
