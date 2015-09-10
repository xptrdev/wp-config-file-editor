<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class WPLangDir extends Constant {

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
		'Where to load language\'s file'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'WPLANG_DIR';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

