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
abstract class DropDownField extends FieldBase {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $multiple = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $size;
	
	/**
	* put your comment there...
	* 
	*/
	protected abstract function getOptionsList();

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $parent
	* @param mixed $elems
	* @return \DOMElement
	*/
	protected function & renderInput( \DOMDocument & $document, \DOMElement & $parent, $elems )
	{
		# Create drop down list
		$dropDownList = $document->createElement( 'select' );
		$field =& $this->getField();
		
		# Attributes
		foreach ( array( 'size', 'multiple' ) as $attrName )
		{
			
			if ( $this->$attrName )
			{
				$dropDownList->setAttribute( $attrName, $multiple );
			}
			
		}
		
		# Fill list
		foreach ($this->getOptionsList() as $value => $text) 
		{
			# Create option for every option list item
			$option = $document->createElement('option');
			
			$option->setAttribute('value', $value);
			$option->nodeValue = $text;
			
			# Select option if the submitted value as the same as
			# the currenr option
			if ($field->getValue() == $value) 
			{
				$option->setAttribute('selected', 'selected');
			}
			
			# Add to ilst
			$dropDownList->appendChild($option);
			
		}
		
		# Return list
		return $dropDownList;
	
	}	

}
