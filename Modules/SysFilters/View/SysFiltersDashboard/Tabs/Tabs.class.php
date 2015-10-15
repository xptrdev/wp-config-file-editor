<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\TabsBase;

/**
* 
*/
class Tabs extends TabsBase {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $id = 'wcfe-options-tab';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_SYSFILTERS_REGISTER_TABS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsList = array
	( 
		'WCFE\Modules\SysFilters\View\SysFiltersDashboard\Tabs\Tabs' => array
		(
			'Misc',
		 	'HTTP',
		 	'Editor',
		 	'Kses',
		)
	);

}
