<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class PostEmptyTrashDays extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'this constant controls the number of days before WordPress permanently deletes 
		posts, pages, attachments, and comments, from the trash bin'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'EMPTY_TRASH_DAYS';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\NumericType();
	}

}

