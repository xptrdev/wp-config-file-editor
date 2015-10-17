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
	protected $addNew = true;

	/**
	* put your comment there...
	* 
	* @param \DOMDocument $document
	* @param {\DOMDocument|\DOMElement} $list
	* @param mixed $formAdapter
	* @param mixed $key
	* @param mixed $item
	* @param mixed $field
	* @param mixed $elems
	* @return \DOMElement
	*/
	protected function createItem( 	\DOMDocument & $document, 
																	\DOMElement $list, 
																	& $formAdapter, 
																	$key, 
																	$name,
																	$item,
																	$elems )
	{
		
		$li = $document->createElement( 'li' );
		
		# Create option for every option list item
		$checkBox = new CheckboxField( $this->getForm(), $item[ 'field' ], $item[ 'text' ], null, $item[ 'value' ] );

		// Structure checkbox list compatibility		
		if ( isset( $item[ 'checked' ] ) )
		{
			$checkBox->setChecked( $item[ 'checked' ] );
		}
		
		
		$checkboxEle = $checkBox->render( $document, $list, $elems, $formAdapter );
		$checkboxEle->setAttribute( 'name', $name );
		
		$text = $document->createElement( 'span' );
		$text->nodeValue = $item[ 'text' ];
		
		$li->appendChild( $checkboxEle );
		$li->appendChild( $text );
		
		$list->appendChild( $li );
		
		return $li;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $itemKey
	* @param mixed $item
	* @param mixed $formAdapter
	*/
	protected function getItemName( $itemKey, $item, & $formAdapter )
	{
		return $formAdapter->getFieldName( $this ) . '[]';
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getItems()
	{
		$items = array();
		
		$fields = $this->getField()->getFields();
		
		foreach ( $fields as $field )
		{
			
			$value = $field->getValue();
			
			$items[] = array
			( 
				'field' => $field, 
				'text' => $value, 
				'value' => $value
			);
			
		}
		
		return $items;
	}

	/**
	* put your comment there...
	* 
	* @param \DOMElement $container
	*/
	protected function onListCreated( \DOMElement & $container, & $formAdapter ) {}
	
	/**
	* put your comment there...
	* 
	* @param \DOMDocument $doc
	* @param mixed $item
	* @param \DOMElement $li
	* @param mixed $formAdapter
	*/
	protected function onRenderItem( \DOMDocument $doc, $item, \DOMElement $li, & $formAdapter ) {}
	
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
		
		$form =& $this->getForm();
		$field =& $this->getField();
		
		# Create drop down list
		$list = $document->createElement( 'ul' );
		
		$items = $this->getItems();
		
		# Fill list
		foreach ( $items as $key => $item )
		{
		
			$li = $this->createItem( 
				$document, 
				$list, 
				$formAdapter, 
				$key, 
				$this->getItemName( $key, $item, $formAdapter ), 
				$item,
				$elems 
			);
			
			$this->onRenderItem( $document, $item, $li, $formAdapter );
			
		}
		
		$list->appendChild( $document->createTextNode( ' ' ) );
		
		# Checkbox list specific css class
		$row->setAttribute( 'class', $row->getAttribute( 'class' ) . " checkbox-list" );
		
		$container = $document->createElement( 'div' );
		$container->setAttribute( 'class', 'wcfe-checkbox-list-container' );
		
		$container->appendChild( $list );
						
		if ( $this->addNew )
		{
			# Add button
			$inputElement = $document->createElement( 'input' );
		
			$inputElement->setAttribute( 'type', 'text' );
			$inputElement->setAttribute( 'id', $formAdapter->getFieldName( $this ) );
			$inputElement->setAttribute( 'class', 'checkbox-list-input' );
			
			$container->appendChild( $inputElement );			
		}
		
		$this->onListCreated( $container, $formAdapter );
		
		$row->appendChild( $container );
		
		# Return list
		return $list;
	
	}	

}
