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
class DatabaseOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'DbHost', 
			'DbUser', 
			'DbPassword', 
			'DbName', 
			'DbCharSet', 
			'DbCollate',
			'DbTablePrefix'
		)
	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Database';
	
}