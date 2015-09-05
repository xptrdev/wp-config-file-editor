<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteSiteId extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Multi Site Current site Id'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'SITE_ID_CURRENT_SITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\NumericType();
	}

}

