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
class ProxyBypassHosts extends Forms\Fields\FormArrayField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() 
	{
		# Set field name and rules
		parent::__construct( 'ProxyBypassHosts', new Forms\Fields\FormStringField( 'host' ) );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() 
	{
		$this->setValue( ( defined( 'WP_PROXY_BYPASS_HOSTS' ) && WP_PROXY_BYPASS_HOSTS )  ? explode( ',',  WP_PROXY_BYPASS_HOSTS ) : array() );
	}

}

