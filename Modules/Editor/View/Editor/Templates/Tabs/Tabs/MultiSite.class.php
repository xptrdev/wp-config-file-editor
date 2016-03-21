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
class MultiSiteOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_MULTISITE_FIELDS;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'MultiSiteAllow',
			'MultiSite',
			'MultiSiteSubDomainInstall',
			'MultiSiteDomainCurrentSite',
			'MultiSitePathCurrentSite', 
			'MultiSiteSiteId',
			'MultiSiteBlogId',
			'MultiSitePrimaryNetworkId',
		)
	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Multi Sites' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}