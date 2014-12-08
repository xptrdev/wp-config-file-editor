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
	* @var mixed
	*/
	protected $maxLength;
	
	/**
	* put your comment there...
	* 
	*/
	public function getMaxLength() {
		return $this->maxLength;
	}

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
		# Set other attributes
		if ($maxLength = $this->getMaxLength()) {
			$textInput->setAttribute('maxlength', $maxLength);
		}
		# Return input 
		return $textInput;
	}

}
