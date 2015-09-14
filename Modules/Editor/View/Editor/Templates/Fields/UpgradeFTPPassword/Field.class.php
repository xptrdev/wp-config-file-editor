<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeFTPPassword;

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
		return 'Password';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'The password for the username entered for FTP_USER. If you are using SSH public key authentication this can be omitted.';
	}

}
