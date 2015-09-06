<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteAllow extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Setup Multi site'
	);

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
	protected $name = 'WP_ALLOW_MULTISITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

