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
class MultiSiteDomainCurrentSite extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct( 'MultiSiteDomainCurrentSite' );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'DOMAIN_CURRENT_SITE' ) ? DOMAIN_CURRENT_SITE : null );
	}

}

