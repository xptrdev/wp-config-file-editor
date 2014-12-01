<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Fields;

# Field framework
use WPPFW\Forms\Form;
use WPPFW\Forms\Fields\IField;

/**
* 
*/
abstract class InputField extends FieldBase {

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @return {\DOMDocument|\DOMElement}
	*/
	public function & renderInput(\DOMDocument & $document) {
		# Create text input
		$textInput = $document->createElement('input');
		$field =& $this->getField();
		# Set parameters
		$textInput->setAttribute('type', 'text');
		$textInput->setAttribute('value', $field->getValue());
		# Return input 
		return $textInput;
	}

}
