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
class UpgradeOptionsTab extends SimpleSubContainerTab {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fieldsPluggableFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_UPGRADE_FIELDS;
	
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
				'UpgradeAutoDisable',
				'UpgradeAutoCore',
				'UpgradeDisablePluggables',
			)
		),
		'FTP' => array
		(
			'WCFE\Modules\Editor\View\Editor\Templates\Fields' => array
			(
				'UpgradeFSMethod',
				'UpgradeFTPBase',
				'UpgradeFTPContentDir',
				'UpgradeFTPPluginDir',
				'UpgradeFTPPubKey',
				'UpgradeFTPPriKey',
				'UpgradeFTPUser',
				'UpgradeFTPPassword',
				'UpgradeFTPHost',
				'UpgradeFTPSSL',
			)		
		)

	);

	/**
	* put your comment there...
	* 
	*/
	protected function initialize() 
	{
        $this->title = $this->_( 'Upgrade' );
        
		$this->fields = $this->bcCreateFieldsList( $this->fields );
	}

}