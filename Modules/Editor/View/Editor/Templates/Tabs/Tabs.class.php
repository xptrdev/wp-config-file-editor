<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

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
	protected $tabsFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_REGISTER_TABS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsList = array
	( 
		'WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs' => array
		(
		 	'Maintenance',
		 	'Security',
		 	'Upgrade',
		 	'Post',
		 	'Localization',
		 	'Cron',
		 	'MultiSite',
		 	'Database',
		 	'SecureKeys',
		 	'Debugging',
		 	'Proxy',
		 	'Cookies',
		)
	);

}
