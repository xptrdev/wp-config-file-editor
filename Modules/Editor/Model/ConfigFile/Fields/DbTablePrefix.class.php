<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class DbTablesPrefix extends Variable {

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'table_prefix';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

