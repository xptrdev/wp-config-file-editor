<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs\Tabs;

# Imports
use WCFE\Modules\Editor\View\Editor\Templates\Tabs\SimpleSubContainerTab;

/**
* 
*/
class SecurityOptionsTab extends SimpleSubContainerTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECURITY_FIELDS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'Generic' => array
		(
			'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
			(
				'SecurityDisablePluggablesEditor',
				'SecurityForceSSLAdmin',
				'SecurityForceSSLLogin',
				'SecurityDisallowUnfilteredHTML',
				'SecurityAllowUnfilteredUploads',
			)		
		),
		'BlockExternal' => array
		(
			'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
			(
				'SecurityBlockExternalUrl',
				'SecurityAccessibleHosts',
			)		
		),

	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Security' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}