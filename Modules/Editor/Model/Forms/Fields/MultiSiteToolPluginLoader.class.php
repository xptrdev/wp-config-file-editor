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
class MultiSiteToolPluginLoader extends Forms\Fields\FormStringField implements IWPConfigFileField {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Set field name and rules
		parent::__construct('MultiSiteToolPluginLoader');
	}

	/**
	* put your comment there...
	* 
	*/
	public function read() 
	{
		# We never want to read this. This is need to be generated
		# and removed again but never need to read as never need to change value
		$this->setValue( null );
	}

}

