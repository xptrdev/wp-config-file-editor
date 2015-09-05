<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteDomainCurrentSite extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Multi Site Domain'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DOMAIN_CURRENT_SITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

