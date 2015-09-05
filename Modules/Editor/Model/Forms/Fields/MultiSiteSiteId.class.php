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
class MultiSiteSiteId extends Forms\Fields\FormIntegerField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct( 'MultiSiteSiteId' );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() {
		$this->setValue( defined( 'SITE_ID_CURRENT_SITE' ) ? SITE_ID_CURRENT_SITE : null );
	}

}

