<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class UpgradeFTPUser extends Constant {

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
		'either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'FTP_USER';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

