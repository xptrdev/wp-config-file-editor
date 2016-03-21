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
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_DATABASE_FIELDS;
	
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
			'DbPort',
			'DbUser', 
			'DbPassword', 
			'DbName', 
			'DbCharSet', 
			'DbCollate',
			'DbTablePrefix',
			'DbAllowRepair',
			'DbDontUpgradeGlobalTables'
		)
	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Database' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}