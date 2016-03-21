<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\CookiePluginsPath;

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
	protected $class = 'path long-input';

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->_( 'Plugins Path' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'Plugins Path Cookie' );
	}

}
