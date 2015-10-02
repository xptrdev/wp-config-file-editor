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
class InputField extends FieldBase {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $maxLength;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $type = 'text';
	
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
	*/
	public function getType() {
		return $this->type;
	}

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
		$textInput = $document->createElement( 'input' );
		$field =& $this->getField();
		
		# Set parameters
		$textInput->setAttribute( 'type' , $this->getType() );
		$textInput->setAttribute( 'value', $field->getValue() );
		$textInput->setAttribute( 'class', $this->class );
		
		# Set other attributes
		if ( $maxLength = $this->getMaxLength() ) 
		{
			$textInput->setAttribute( 'maxlength', $maxLength );
		}
		
		# Append to row			
		$row->appendChild( $textInput );
		
		return $textInput;
	}

}
