<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;

/**
* 
*/
class ConfigFileForm extends Forms\SecureForm {
	
	/**
	* 
	*/
	const TASK_PREVIEW = 'Preview';
	
	/**
	* 
	*/
	const TASK_SAVE = 'Save';
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Define form parameters
		parent::__construct('configFileFields', 'stoken');
		# Add fields
		$this->addChain(new Fields\DbName())
		->addChain(new Fields\DbUser())
		->addChain(new Fields\DbPassword())
		->addChain(new Fields\DbHost())
		->addChain(new Fields\DbCharSet())
		->addChain(new Fields\DbCollate())
		->addChain(new Fields\DbTablePrefix())
		
		->addChain(new Fields\AuthKey())
		->addChain(new Fields\SecureAuthKey())
		->addChain(new Fields\LoggedInKey())
		->addChain(new Fields\NonceKey())
		->addChain(new Fields\AuthSalt())
		->addChain(new Fields\SecureAuthSalt())
		->addChain(new Fields\LoggedInSalt())
		->addChain(new Fields\NonceSalt())
		
		->addChain(new Fields\WPDebug())
		->addChain(new Fields\WPLang())
		
		->addChain(new Fields\Others\Task());
	}

}
