<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityForceSSLAdmin extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'FORCE_SSL_ADMIN';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

