<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\Tabs\Editor;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\CheckboxListField;

/**
* 
*/
class Plugins extends CheckboxListField {

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
		
		$plugins = \WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel::getDefaultsSection( 'editor', 'plugins', 'value' );
		
		foreach ( $plugins as $plugin )
		{
			
			$items[] = array
			( 
				'field' => isset( $fieldsMap[ $plugin ] ) ? $fieldsMap[ $plugin ] : $notCheckedField,
				'text' => ucfirst( $plugin ), 
				'value' => $plugin
			);
			
		}
		
		return $items;
	}

}
