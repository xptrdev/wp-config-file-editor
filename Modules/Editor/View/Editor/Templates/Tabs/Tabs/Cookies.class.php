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
class CookiesOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_COOKIES_FIELDS;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'CookieHash',
			'CookieUser',
			'CookiePass',
			'CookieAuth',
			'CookieSecureAuth',
			'CookieLoggedIn',
			'CookieTest',
			'CookiePath',
			'CookieHash',
			'CookieSitePath',
			'CookieAdminPath',
			'CookiePluginsPath',
			'CookieDomain',
		)		

	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Cookies' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}