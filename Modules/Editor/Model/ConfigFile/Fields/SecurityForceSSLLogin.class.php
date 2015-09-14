<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class SecurityForceSSLLogin extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'when you want to secure logins so that passwords are not sent in the clear, but you still want to allow non-SSL admin sessions (since SSL can be slow).'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'FORCE_SSL_LOGIN';

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

