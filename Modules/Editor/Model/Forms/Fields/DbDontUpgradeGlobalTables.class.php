<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms\Fields;

# Field base
use WPPFW\Forms;

/**
* 
*/
class DbDontUpgradeGlobalTables extends Forms\Fields\FormIntegerField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('DbDontUpgradeGlobalTables');
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'DO_NOT_UPGRADE_GLOBAL_TABLES' ) ? DO_NOT_UPGRADE_GLOBAL_TABLES : null );
	}

}

