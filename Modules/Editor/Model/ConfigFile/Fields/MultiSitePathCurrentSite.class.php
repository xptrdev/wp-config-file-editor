<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSitePathCurrentSite extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Multi Site Current Root path'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'PATH_CURRENT_SITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

