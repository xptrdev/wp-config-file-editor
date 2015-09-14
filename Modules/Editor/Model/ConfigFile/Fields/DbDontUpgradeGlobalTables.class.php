<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbDontUpgradeGlobalTables extends Constant {

  /**
  * put your comment there...
  * 
  * @var mixed
  */
	protected $comments = array
	(
		'A DO_NOT_UPGRADE_GLOBAL_TABLES define prevents dbDelta() and the upgrade functions from doing expensive queries against global tables'
	);

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'DO_NOT_UPGRADE_GLOBAL_TABLES';

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $suppressOutput = true;

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\BooleanType();
	}

}

