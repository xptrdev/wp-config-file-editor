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
class ProxyOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_PROXY_FIELDS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'ProxyHost',
			'ProxyPort',
			'ProxyUser',
			'ProxyPassword',
			'ProxyBypassHosts',			
		)		

	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Proxy';
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}