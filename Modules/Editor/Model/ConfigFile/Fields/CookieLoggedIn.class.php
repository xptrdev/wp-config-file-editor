<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CookieLoggedIn extends CookieNamedBase {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $cookiePrefix = 'wordpress_logged_in_';

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Logged In Cookie'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'LOGGED_IN_COOKIE';

}

