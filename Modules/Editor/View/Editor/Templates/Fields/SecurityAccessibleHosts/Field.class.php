<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\SecurityAccessibleHosts;

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
		return $this->_( 'Accessible Hosts List' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->_( 'Write host you would like to allow in the input field and preess Enter. The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.' );
	}
  
}
