<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\ProxyPort;

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
		return 'Port';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return 'Proxy port for connection. No default, must be defined';
	}

}
