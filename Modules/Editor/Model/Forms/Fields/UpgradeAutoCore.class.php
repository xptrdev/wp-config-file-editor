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
class UpgradeAutoCore extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('UpgradeAutoCore');
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() 
	{

		$value = null;
		
		if ( defined( 'WP_AUTO_UPDATE_CORE' ) )
		{
			
			# Transform the value to string 
			# (BOOL) TRUE => 'true'
			# (BOOL) FALSE => 'false'
			# (STRING) 'minor' => 'minor' -- no changes
			if ( is_bool( WP_AUTO_UPDATE_CORE ) )
			{
				$value = WP_AUTO_UPDATE_CORE ? 'true' : 'false';
			}
			else
			{
				$value = WP_AUTO_UPDATE_CORE;
			}
			
		}
		
		$this->setValue( $value );
	}

}

