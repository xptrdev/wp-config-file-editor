<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields\Others;

# Field base
use WPPFW\Forms;

/**
* 
*/
class Task extends Forms\Fields\FormStringField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('Task', array( new \WPPFW\Forms\Rules\RequiredField() ));
	}

}