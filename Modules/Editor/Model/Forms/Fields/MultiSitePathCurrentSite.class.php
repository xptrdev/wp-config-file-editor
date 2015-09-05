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
class MultiSitePathCurrentSite extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct( 'MultiSitePathCurrentSite' );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'PATH_CURRENT_SITE' ) ? PATH_CURRENT_SITE : null );
	}

}

