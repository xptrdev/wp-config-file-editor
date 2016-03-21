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
class CronOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_CRON_FIELDS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'Cron',
			'CronAlternate',
			'CronLockTimeOut',
		)
	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Cron' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}