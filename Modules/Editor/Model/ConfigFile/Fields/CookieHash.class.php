<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class CookieHash extends Constant {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Cookies Hash'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'COOKIEHASH';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

