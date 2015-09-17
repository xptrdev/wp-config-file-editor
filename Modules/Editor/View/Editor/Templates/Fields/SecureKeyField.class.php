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
abstract class SecureKeyField extends InputField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $maxLength = 64;

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param mixed $row
	* @return SecureKeyField
	*/
	public function & renderInput(\DOMDocument & $document, \DOMElement & $row, $elems )
	{
		
		# Input field
		$inputField = parent::renderInput( $document, $row, $elems );
		
		# Secure key generator link
		$skGenButton = $document->createElement( 'a' );
		
		$skGenButton->setAttribute( 'class', 'secure-key-generator-key' );
		$skGenButton->setAttribute( 'href', '#' );
		
		$skGenButton->nodeValue = '&nbsp;';
		
		# Add input field class
		$inputField->setAttribute( 'class', 'secure-key-field' );
		
		$row->appendChild( $inputField );
		
		$row->appendChild( $skGenButton );
		
		return $inputField;
	}

}
