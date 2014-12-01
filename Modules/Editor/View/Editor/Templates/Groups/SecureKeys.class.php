<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Groups;

/**
* 
*/
class SecureKeys extends Group {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $fields = array(
		'AuthKey', 
		'SecureAuthKey', 
		'LoggedInKey', 
		'NonceKey', 
		'AuthSalt', 
		'SecureAuthSalt', 
		'LoggedInSalt', 
		'NonceSalt'
	);
	
	/**
	* put your comment there...
	* 
	*/
	protected function getTitle() {
		return 'Secure keys';
	}

}