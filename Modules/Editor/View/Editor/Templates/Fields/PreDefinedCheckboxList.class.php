<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Fields;;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\CheckboxListField;

/**
* 
*/
class PreDefinedCheckboxList extends CheckboxListField {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $addNew = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $predefinedList;
	
	/**
	* put your comment there...
	* 
	* @param mixed $list
	*/
	public function setPreDefinedList( $list )
	{
		$this->predefinedList = $list;		
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getItems()
	{
		                                                                                                       
		$fields = $this->getField()->getFields();
		$notCheckedField = clone $this->getField()->getFieldPrototype();
		$fieldsMap = array();
		$items = array();
		
		# Map value to field
		foreach ( $fields as $field )
		{
			$fieldsMap[ $field->getValue() ] = $field;
		}
		
		foreach ( $this->predefinedList as $item )
		{
			
			$items[] = array
			( 
				'field' => isset( $fieldsMap[ $item ] ) ? $fieldsMap[ $item ] : $notCheckedField,
				'text' => ucfirst( $item ), 
				'value' => $item
			);
			
		}
		
		return $items;
	}

}
