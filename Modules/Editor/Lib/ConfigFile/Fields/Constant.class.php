<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class Constant
extends Field
{

	/**
	* put your comment there...
	* 
	*/
	public function getDefString()
	{
        
		$value = $this->type->prepareValue( $this->getValue() );
        
		return "define('{$this->getName()}', {$value});";
	}

}