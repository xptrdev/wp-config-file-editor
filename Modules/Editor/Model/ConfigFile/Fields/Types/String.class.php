<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields\Types;

/**
* 
*/
class StringType implements Itype {
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function prepareValue($value) {
		return "'{$value}'";
	}

}