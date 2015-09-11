<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class PostRevisionsMax extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Disable / Enable Post Revisions and specify revisions max count'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WP_POST_REVISIONS';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\NumericType();
	}

}

