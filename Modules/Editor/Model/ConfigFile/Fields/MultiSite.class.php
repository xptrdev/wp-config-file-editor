<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSite extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Enable Multisite for current Wordpress installation'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'MULTISITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

