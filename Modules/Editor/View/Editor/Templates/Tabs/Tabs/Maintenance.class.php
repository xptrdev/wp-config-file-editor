<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\FieldsTab;

/**
* 
*/
class MaintenanceOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'WPCache', 
			'MemoryLimit', 
			'MaxMemoryLimit', 
		)
	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Maintenance';
	
}