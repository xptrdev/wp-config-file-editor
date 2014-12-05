<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;

/**
* 
*/
class RawConfigFileForm extends Forms\SecureForm {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Define form parameters
		parent::__construct('rawConfigFile', 'stoken');
		# Add fields
		$this->addChain(new Forms\Fields\FormStringField('configFileContent'));
	}
	
}