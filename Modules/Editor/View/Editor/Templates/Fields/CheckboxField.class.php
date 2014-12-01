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
abstract class CheckboxField extends FieldBase {

	/**
	* put your comment there...
	* 
	*/
	protected abstract function getValue();
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @return {\DOMDocument|\DOMElement}
	*/
	public function & renderInput(\DOMDocument & $document) {
		# Create text input
		$chkbox = $document->createElement('input');
		$field =& $this->getField();
		# Set parameters
		$chkbox->setAttribute('type', 'checkbox');
		$chkbox->setAttribute('value', $this->getValue());
		# Mark checked
		if ($this->getValue() == $field->getValue()) {
			$chkbox->setAttribute('checked', 'checked');
		}
		# Finally give the row a class for checkbox types
		$this->getRow()->setAttribute('class', 'checkbox-row');
		# Return input 
		return $chkbox;
	}

}
