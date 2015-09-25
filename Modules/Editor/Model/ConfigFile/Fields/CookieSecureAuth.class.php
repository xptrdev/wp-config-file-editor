<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CookieSecureAuth extends CookieNamedBase {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $cookiePrefix = 'wordpress_sec_';

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Where to load language\'s file'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'SECURE_AUTH_COOKIE';

}

