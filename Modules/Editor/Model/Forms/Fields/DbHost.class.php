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
class DbHost extends FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue(DB_HOST);
	}

}

