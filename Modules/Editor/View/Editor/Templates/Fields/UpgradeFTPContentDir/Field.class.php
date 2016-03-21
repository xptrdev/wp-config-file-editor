<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeFTPContentDir;

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
		return $this->_( 'FTP Content Dir ABS Path' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'The full path to the wp-content folder of the WordPress installation' );
	}

}
