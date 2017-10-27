<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class Variable
extends Field
{

	/**
	* put your comment there...
	* 
	*/
	public function getDefString()
	{
		
		$value = $this->type->prepareValue($this->getValue());
        
		return "\${$this->getName()} = {$value};";
	}
}