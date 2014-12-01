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
class ConfigFileForm extends Forms\Form {
	
	/**
	* put your comment there...
	* 
	*/
	public function __construct() {
		# Define form parameters
		parent::__construct('configFileFields');
		# Add fields
		$this->addChain(new Fields\DbName('DbName'))
		->addChain(new Fields\DbUser('DbUser'))
		->addChain(new Fields\DbPassword('DbPassword'))
		->addChain(new Fields\DbHost('DbHost'))
		->addChain(new Fields\DbCharSet('DbCharSet'))
		->addChain(new Fields\DbCollate('DbCollate'))
		->addChain(new Fields\DbTablePrefix('DbTablePrefix'))
		->addChain(new Fields\AuthKey('AuthKey'))
		->addChain(new Fields\SecureAuthKey('SecureAuthKey'))
		->addChain(new Fields\LoggedInKey('LoggedInKey'))
		->addChain(new Fields\NonceKey('NonceKey'))
		->addChain(new Fields\AuthSalt('AuthSalt'))
		->addChain(new Fields\SecureAuthSalt('SecureAuthSalt'))
		->addChain(new Fields\LoggedInSalt('LoggedInSalt'))
		->addChain(new Fields\NonceSalt('NonceSalt'))
		->addChain(new Fields\WPDebug('WPDebug'))
		->addChain(new Fields\WPLang('WPLang'));
	}

}
