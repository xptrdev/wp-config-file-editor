<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
abstract class Variable extends Field {

	/**
	* put your comment there...
	* 
	*/
	protected function getDefString()
	{
		# Prepare Value
		$value = $this->type->prepareValue( $this->getValue() );
		# Final statment
		return "\${$this->getName()} = {$value};";
	}
}