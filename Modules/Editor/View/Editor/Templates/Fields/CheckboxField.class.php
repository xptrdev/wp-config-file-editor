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
class CheckboxField extends FieldBase {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $value;

	/**
	* put your comment there...
	* 
	* @param Form $form
	* @param {Form|IField} $field
	* @param mixed $text
	* @param mixed $tipText
	* @param mixed $value
	* @return CheckboxField
	*/
	public function __construct(Form & $form, IField & $field, $text = null, $tipText = null, $value = null) 
	{
		
		parent::__construct( $form, $field, $text, $tipText );
		
		$this->value = $value;
		
	}

	/**
	* put your comment there...
	* 
	*/
	protected function getValue()
	{
		return $this->value;
	}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elems
	* @return \DOMElement
	*/
	protected function & renderInput( \DOMDocument & $document, \DOMElement & $row, $elems ) 
	{
		# Create text input
		$chkbox = $document->createElement( 'input' );
		$field =& $this->getField();
		
		# Set parameters
		$chkbox->setAttribute( 'type', 'checkbox' );
		$chkbox->setAttribute( 'value', $this->getValue() );
		
		# Mark checked
		if ( $this->getValue() == $field->getValue() ) 
		{
			$chkbox->setAttribute( 'checked', 'checked' );
		}
		
		# Finally give the row a class for checkbox types
		$row->setAttribute( 'class', 'checkbox-row' );
		
		return $chkbox;		
	}

}
