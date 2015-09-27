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
class CheckboxListField extends FieldBase {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $items;
	
	/**
	* put your comment there...
	* 
	* @param mixed $form
	* @param mixed $field
	* @param mixed $text
	* @param mixed $tipText
	* @param mixed $items
	* @return CheckboxListField
	*/
	public function __construct(Form & $form, IField & $field, $text = null, $tipText = null, $items = array() ) 
	{
		parent::__construct( $form, $field, $text, $tipText );
		
		$this->items = $items;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getItems()
	{
		return $this->items;
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
		
		$form =& $this->getForm();
		$field =& $this->getField();
		
		# Create drop down list
		$list = $document->createElement( 'ul' );
		
		$items = $this->getItems();
		
		# Fill list
		foreach ( $items as $item )
		{
			
			$li = $document->createElement( 'li' );
			
			# Create option for every option list item
			$checkBox = new CheckboxField( $form, $item[ 'field' ], $item[ 'text' ], null, $item[ 'value' ] );
			
			$checkboxEle = $checkBox->render( $document, $list, $elems );
			$checkboxEle->setAttribute( 'name', $form->getName() . '[' . $field->getName() . '][]' );
			
			$text = $document->createElement( 'span' );
			$text->nodeValue = $item[ 'text' ];
			
			$li->appendChild( $checkboxEle );
			$li->appendChild( $text );
			
			# Add to ilst
			$list->appendChild( $li );
			
		}
		
		$list->appendChild( $document->createTextNode( ' ' ) );
		
		# Checkbox list specific css class
		$row->setAttribute( 'class', $row->getAttribute( 'class' ) . " checkbox-list" );
		
		# Add button
		$inputElement = $document->createElement( 'input' );
		
		$inputElement->setAttribute( 'type', 'text' );
		$inputElement->setAttribute( 'id', $form->getName() . '[' . $field->getName() . ']' );
		$inputElement->setAttribute( 'class', 'checkbox-list-input' );
		
		$container = $document->createElement( 'div' );
		$container->setAttribute( 'class', 'wcfe-checkbox-list-container' );
		
		$container->appendChild( $list );
		
		$container->appendChild( $inputElement );
		
		$row->appendChild( $container );
		
		# Return list
		return $list;
	
	}	

}
