<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class PostAutoSaveInterval extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'Post Autosave Interval'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'AUTOSAVE_INTERVAL';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\NumericType();
	}

}

