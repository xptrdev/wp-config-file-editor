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
class WPLang extends FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue(WPLANG);
	}

}

