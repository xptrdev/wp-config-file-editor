<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\ProxyHost;

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
		return 'Host';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Enable proxy support and host for connecting';
	}

}
