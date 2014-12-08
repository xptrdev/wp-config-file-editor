<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\DbPassword;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\InputField;

/**
* 
*/
class Field extends InputField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type = 'password';
	
	/**
	* put your comment there...
	* 
	*/
	protected function getText() {
		return 'Password';
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTipText() {
		return 'Database user password for authenticating the connection between Wordpress and Database';
	}

}
