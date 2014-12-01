<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbName;

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
		return 'Database Name';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Database name to used for Wordpress installation, All posts/pages/categories and all the data will be stored there';
	}

}
