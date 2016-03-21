<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbAllowRepair;

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
		return  $this->_( 'Automatic Repair' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'Added with Version 2.9, there is automatic database optimization support, which you can enable by adding the following define to your wp-config.php file only when the feature is required. Please Note: That this define enables the functionality, The user does not need to be logged in to access this functionality when this define is set. This is because its main intent is to repair a corrupted database, Users can often not login when the database is corrupt.' );
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue() {
		return 1;
	}

}
