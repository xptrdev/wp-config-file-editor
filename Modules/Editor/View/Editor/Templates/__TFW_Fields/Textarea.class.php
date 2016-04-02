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
class TextareaField extends FieldBase {

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elems
	* @return \DOMElement
	*/
	protected function & renderInput( \DOMDocument & $document, \DOMElement & $row, $elems, & $formAdapter ) 
	{
		# Create text input
		$textInput = $document->createElement( 'textarea' );
		$field =& $this->getField();
		
		# Set parameters
		$textInput->nodeValue = htmlentities( $field->getValue() );
		
		# Append to row			
		$row->appendChild( $textInput );
		
		return $textInput;
	}

}
