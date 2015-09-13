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
class SecurityAccessibleHosts extends Forms\Fields\FormArrayField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		# Set field name and rules
		parent::__construct( 'SecurityAccessibleHosts', new Forms\Fields\FormStringField( 'host' ) );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() 
	{
		$this->setValue( ( defined( 'WP_ACCESSIBLE_HOSTS' ) && WP_ACCESSIBLE_HOSTS )  ? explode( ',',  WP_ACCESSIBLE_HOSTS ) : array() );
	}

}

