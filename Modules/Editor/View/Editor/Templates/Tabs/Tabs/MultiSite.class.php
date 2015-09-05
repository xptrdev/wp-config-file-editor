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
		)
	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Multi Sites';
	
}