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
class DbPort extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct( 'DbPort' );
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() 
	{
		$hostData = explode( ':', DB_HOST );
		
		$this->setValue( isset( $hostData[ 1 ] ) ? $hostData[ 1 ] : null );
	}

}

