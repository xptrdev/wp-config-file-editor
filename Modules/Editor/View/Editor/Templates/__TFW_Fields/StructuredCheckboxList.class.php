<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\Editor\Fields;

use WPPFW\Forms\Fields;

/**
* 
*/
class StructuredCheckboxList extends CheckboxListField
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $addNew = false;
	
	/**
	* put your comment there...
	* 
	* @param mixed $itemKey
	* @param mixed $item
	* @param mixed $formAdapter
	*/
	protected function getItemName( $itemKey, $item, & $formAdapter )
	{
		return $formAdapter->getFieldName( $this ) . "[{$itemKey}][]";
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getItems()
	{
		
		$firstLevelChilds = $this->getField()->getFields();
		$items = array();
		
		foreach ( $firstLevelChilds as $text => $child )
		{
			
			$items[ $text ] = array
			(
				'text' => $text,
				'checked' => true,
				'value' => true,
				'field' => $child
			);
			
		}
		
		ksort( $items );
		
		return $items;
		
	}
  
  /**
  * put your comment there...
  * 
  * @param \DOMElement $container
  */
  protected function onListCreated( \DOMElement & $container, & $formAdapter ) 
  {
		# Add list base name
		$nameField = $container->ownerDocument->createElement( 'input' );
		$nameField->setAttribute( 'type', 'hidden' );
		$nameField->setAttribute( 'id', $formAdapter->getFieldId( $this ) . '-baseName' );
		$nameField->setAttribute( 'value', $formAdapter->getFieldName( $this ) );
		
		$container->appendChild( $nameField );
  }
  
  /**                                                           
  * put your comment there...
  * 
  * @param \DOMDocument $doc
  * @param mixed $item
  * @param \DOMElement $li
  * @param {\DOMElement|\DOMElement} $checkboxEle
  * @param mixed $formAdapter
  */
	protected function onRenderItem( \DOMDocument $doc, $item, \DOMElement $li, & $formAdapter )
	{
		
		# Add child list for current item
		$childList = $doc->createElement( 'ul' );
		$childList->appendChild( $doc->createTextNode( '' ) );
		
		$baseName = $formAdapter->getFieldName( $this );
		
		# Get childs
		$childs = $item[ 'field' ]->getFields();
		
		foreach ( $childs as $childName => $childField )
		{

			$childItem = array(
				'text' => $childName,
				'checked' => true,
				'value' => true,
				'field' => $childField
			);
			
			# Create checkbox item/row
			$this->createItem(
				$doc,
				$childList,
				$formAdapter,
				$childName,
				"{$baseName}[{$item[ 'text' ]}][{$childName}]",
				$childItem,
				null
			);
			
			
		}
		
		$li->appendChild( $childList );
	}
	
}
