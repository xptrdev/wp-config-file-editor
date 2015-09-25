<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CookieTest extends CookieNamedBase {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Test Cookie'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'TEST_COOKIE';

	/**
	* put your comment there...
	* 
	*/
	protected function getSuppressionValue()
	{
		return 'wordpress_test_cookie';
	}

}

