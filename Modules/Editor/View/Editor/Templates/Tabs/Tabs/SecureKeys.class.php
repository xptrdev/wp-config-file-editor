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
class SecureKeysOptionsTab extends FieldsTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECUREKEYS_FIELDS;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array
	(
		'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
		(
			'AuthKey', 
			'SecureAuthKey', 
			'LoggedInKey', 
			'NonceKey', 
			'AuthSalt', 
			'SecureAuthSalt', 
			'LoggedInSalt', 
			'NonceSalt'
		)
	);

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $title = 'Secure Keys';
	
}