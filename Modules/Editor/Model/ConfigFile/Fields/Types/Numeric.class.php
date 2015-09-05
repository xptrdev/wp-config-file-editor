<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields\Types;

/**
* 
*/
class NumericType implements Itype {
	
	/**
	* put your comment there...
	* 
	* @param mixed $value
	*/
	public function prepareValue($value) {
		return $value;
	}

}