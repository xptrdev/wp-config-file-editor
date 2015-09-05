<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class MultiSiteBlogId extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Multi Site current Blog Id'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'BLOG_ID_CURRENT_SITE';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\NumericType();
	}

}

