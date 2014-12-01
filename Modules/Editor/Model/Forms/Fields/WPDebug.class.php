<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields;

# Field base
use WPPFW\Forms\Fields\FormStringField;

/**
* 
*/
class WPDebug extends FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue(WP_DEBUG);
	}

}

