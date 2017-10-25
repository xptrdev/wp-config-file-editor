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
		# Escape any ' found in the value
		$value = addcslashes($value, '\\\'');
		# Wrap as string and returns
		return "'{$value}'";
	}

}