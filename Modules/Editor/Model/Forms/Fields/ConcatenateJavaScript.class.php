<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields;

# Field base
use WPPFW\Forms;

/**
* 
*/
class ConcatenateJavaScript extends Forms\Fields\FormIntegerField implements IWPConfigFileField {

	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('ConcatenateJavaScript');
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'CONCATENATE_SCRIPTS' ) ? CONCATENATE_SCRIPTS : null );
	}

}
