<?php
/**
* 
*/

namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\Tabs\Misc;

use WCFE\Modules\Editor\View\Editor\Fields\CheckboxListField;

/**
* 
*/
class UploadAllowedMimeTypes extends CheckboxListField
{
	
	/**
	* put your comment there...
	* 
	*/
	public function getItems()
	{
		
		$fields = $this->getField()->getFields();
		$items = array();
		
		foreach ( $fields as $field )
		{
			
			$value = $field->getValue();
			$structValue = explode( ',', $value );
			
			$items[] = array
			(
				'text' => $structValue[ 0 ],
				'value' => $value,
				'field' => $field
			);
		}
		
		return $items;
		
	}
}
