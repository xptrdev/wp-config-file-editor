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
	protected function getDefString()
	{
        
		$value = $this->type->prepareValue( $this->getValue() );
        
		return "define('{$this->getName()}', {$value});";
	}

}