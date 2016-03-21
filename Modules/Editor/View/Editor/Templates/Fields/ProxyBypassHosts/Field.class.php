<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\ProxyBypassHosts;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\CheckboxListField;

/**
* 
*/
class Field extends CheckboxListField {

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
	*/
	public function getText() {
		return $this->_( 'Bypass Hosts' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'Will prevent the hosts in this list from going through the proxy' );
	}
  
}
